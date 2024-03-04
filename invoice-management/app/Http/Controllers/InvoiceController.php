<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\Report;
use App\Models\Country;
use App\Models\Project;
use App\Models\Currency;
use App\Models\Customer;
use App\Models\Department;

use Illuminate\Http\Request;
use Illuminate\Mail\Message;
use App\Models\ProjectReport;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;

class InvoiceController extends Controller
{
    public function index()
    {
         $data['customers'] = Customer::all();
         $data['departments'] = Department::all();
         $data['countries'] = Country::all();
         $data['currencies'] = Currency::all();
         $data['projects'] = Project::all();
        return view('invoice.create-invoice',$data);

    }

    public function store(Request $request)
    {

    $requestData = $request->all();

    if(empty($request->customer_id))
    {

            $customer =new Customer();
            $customer->company_name=$request->company_name;
            $customer->contact_person=$request->contact_person;
            $customer->email=$request->email;
            $customer->currency=$request->currency;
            $customer->phone=$request->phone;
            $customer->country=$request->country;
            $customer->full_address=$request->full_address;
            $customer->join_date=date('Y-m-d');
            $customer->create_by=Auth::user()->id;
            $customer->full_address=$request->full_address;
            $customer->save();

            $request->customer_id=$customer->id;


    }
    $projects=[];

           $report=new Report();
           $report->department_id=$request->department_id;
           $report->report_type=$request->invoice_type;
           $report->invoice_date=$request->invoice_date;
           $report->due_date=$request->due_date;
           $report->customer_id=$request->customer_id;
           $report->is_recursive=$request->is_recursive;
           $report->recursive_date=$request->recursive_date;
           $report->create_by=Auth::user()->id;
           $report->report_no=$this->generateReportName($request->department_id,$request->invoice_type);
           $report->save();


    foreach ($requestData as $key => $value) {
        // Check if the key ends with '_0', '_1', or '_3'

        if(count(explode("_",$key)) ==3)
        {
          $index=(explode("_",$key))[2];

          if(empty($value))
          {
               $project_n=new Project();
               $project_n->project_name=$requestData['projectname_'.$index];
               $project_n->description=$requestData['description_'.$index];
               $project_n->price=$requestData['price_'.$index];
               $project_n->currency='INR';
               $project_n->department_id=$request->department_id;
               $project_n->save();

               $value=$project_n->id;
          }

           $project=new ProjectReport();
           $project->project_id=$value;
           $project->report_id=$report->id;
           $project->r_price=$requestData['price_'.$index];
           $project->invoice_date=$request->invoice_date;
           $project->due_date=$request->due_date;
           $project->customer_id =$request->customer_id;
           $project->type=$request->invoice_type;
           $project->department_id=$request->department_id;
           $project->hsn_code=$requestData['hsncode_'.$index];
           $project->quantity=$requestData['quantity_'.$index];
           $project->discount=$requestData['discount_'.$index];
           $project->sub_total=$requestData['subtotal_'.$index];
           $project->gst=$requestData['gst_'.$index];
           $project->shipping=$requestData['shipping_'.$index];
           $project->tax_vat=$requestData['tax_'.$index];
           $project->total_amount=$requestData['total_'.$index];
           $project->save();
           array_push($projects,$project->id);
        }

    }




            Alert::success('Invoice Created', 'Invoice created Successfully');

            return redirect()->route('manage.invoice');



    }

    public function manage_invoice()
    {
       $data['departments']=Department::all();
       $data['reports']=Report::select('reports.*','company_name')->leftJoin('customers','customers.id','reports.customer_id')->paginate(4);
       return view('invoice.manage-invoice',$data);
    }


    public function fetchMoreData(Request $request)
    {
        $page = $request->input('page');
        $perPage = 4;

        $departmentId = $request->input('department_id'); // Get the department_id from the request
        $status = $request->input('status'); // Get the department_id from the request
        $type = $request->input('type'); // Get the department_id from the request
        $monthFilter = $request->input('month');
        $reportsQuery = Report::select('reports.*', 'company_name')
            ->leftJoin('customers', 'customers.id', 'reports.customer_id');

        // Check if department_id exists and add a where clause accordingly
        if ($departmentId) {
            $reportsQuery->where('department_id', $departmentId);
        }
        if ($status) {
            $reportsQuery->where('reports.status', $status);
        }

        if ($type) {
            $reportsQuery->where('reports.report_type', $type);
        }

         if ($monthFilter) {
        switch ($monthFilter) {
            case 'today':
                $reportsQuery->whereDate('invoice_date', Carbon::today());
                break;
            case 'month':
                $reportsQuery->whereMonth('invoice_date', Carbon::now()->month);
                break;
            case 'six':
                $reportsQuery->whereBetween('invoice_date', [Carbon::now()->startOfYear(), Carbon::now()->addMonths(6)]);
                break;
            case 'year':
                $reportsQuery->whereYear('invoice_date', Carbon::now()->year);
                break;
            default:
                // Handle default case if needed
                break;
        }
    }



        $reports = $reportsQuery->orderBy('id','desc')->paginate($perPage, ['*'], 'page', $page);

        return response()->json($reports);
    }


    function generateReportName($department, $type)
    {
        $name = '';
        $typeStr = '';

        switch ($department) {
            case 1:
                $name = 'OMRD';
                break;
            case 2:
                $name = 'ENCT';
                break;
            case 3:
                $name = 'OMRG';
                break;
            default:
                // Default case if department is not 1, 2, or 3
                break;
        }

        switch ($type) {
            case 1:
                $typeStr = 'Invoice';
                break;
            case 2:
                $typeStr = 'Quotation';
                break;
            case 3:
                $typeStr = 'Proforma';
                break;
            case 4:
                $typeStr = 'Receipt';
                break;
            default:
                // Default case if type is not 1, 2, 3, or 4
                break;
        }

        $reportCount = Report::count() + 1;

        return $typeStr . '_' . $name . date('Y') . '_' . $reportCount;
    }

    public function edit($id)
    {
        $invoice=Report::find($id);
        $data['invoice']=$invoice;
        $data['projects']=Project::all();
        $data['customer']=Customer::find($invoice->customer_id);
        $data['customers']=Customer::all();
         $data['departments'] = Department::all();

         $data['countries'] = Country::all();
         $data['currencies'] = Currency::all();
        $data['report_ids'] = ProjectReport::where('report_id',$id)->pluck('project_id')->toArray();

        $data['reports']=ProjectReport::select('project_reports.*','project_name','description')->leftJoin('projects','projects.id','project_reports.project_id')->where('report_id',$id)->get();
        return view('invoice.edit-invoice',$data);
    }

    public function update(Request $request,$id)
    {

         $requestData = $request->all();

            if(empty($request->customer_id))
            {
                    $customer =new Customer();
                    $customer->company_name=$request->company_name;
                    $customer->contact_person=$request->contact_person;
                    $customer->email=$request->email;
                    $customer->currency=$request->currency;
                    $customer->phone=$request->phone;
                    $customer->country=$request->country;
                    $customer->full_address=$request->full_address;
                    $customer->join_date=date('Y-m-d');
                    $customer->create_by=Auth::user()->id;
                    $customer->full_address=$request->full_address;
                    $customer->save();
                    $request->customer_id=$customer->id;
            }

           $report=Report::find($id);
           $report->department_id=$request->department_id;
           $report->report_type=$request->invoice_type;
           $report->invoice_date=$request->invoice_date;
           $report->due_date=$request->due_date;
           $report->customer_id=$request->customer_id;

           $report->is_recursive=$request->is_recursive;
           if($request->is_recursive==0)
           {
            $report->recursive_date=null;

           }else{
           $report->recursive_date=$request->recursive_date;
           }
           $report->save();

           ProjectReport::where('report_id',$report->id)->delete();

            foreach ($requestData as $key => $value) {

                if(count(explode("_",$key)) ==3)
                {
                        $index=(explode("_",$key))[2];


                       if(empty($requestData['project_id_'.$index]))
                        {
                            $project_n=new Project();
                            $project_n->project_name=$requestData['projectname_'.$index];
                            $project_n->description=$requestData['description_'.$index];
                            $project_n->price=$requestData['price_'.$index];
                            $project_n->currency='INR';
                            $project_n->save();
                            $value=$project_n->id;

                            echo "empty";
                        }

                        $projects=new ProjectReport();



                        $projects->project_id=$value;
                        $projects->report_id=$report->id;
                        $projects->r_price=$requestData['price_'.$index];
                        $projects->invoice_date=$request->invoice_date;
                        $projects->due_date=$request->due_date;
                        $projects->customer_id =$request->customer_id;
                        $projects->type=$request->invoice_type;
                        $projects->department_id=$request->department_id;
                        $projects->hsn_code=$requestData['hsncode_'.$index];
                        $projects->quantity=$requestData['quantity_'.$index];
                        $projects->discount=$requestData['discount_'.$index];
                        $projects->sub_total=$requestData['subtotal_'.$index];
                        $projects->gst=$requestData['gst_'.$index];
                        $projects->shipping=$requestData['shipping_'.$index];
                        $projects->tax_vat=$requestData['tax_'.$index];
                        $projects->total_amount=$requestData['total_'.$index];
                        $projects->save();



                }

            }

                           Alert::success('Invoice Updated', 'Invoice updated Successfully');

                            return redirect()->route('manage.invoice');

    }

    public function statusUpdate(Request $request)
    {

       $report= Report::find($request->data['report_id']);
       $report->status=$request->data['status'];
       $query=$report->save();
       if($query)
       {
            return 1;
       }else{
         return 0;
       }

    }

    public function view($id)
    {

         $data=[];

        // return view('pdf.document',$data);



        $report=Report::find($id);
        $report->invoice_type=$this->getCompanyDetails($report->department_id,$report->report_type)['type'];


        $data['report']=$report;
        $data['projects']=ProjectReport::where('report_id',$id)->leftJoin('projects','projects.id','project_reports.project_id')->get();
        $data['customer']=Customer::find($report->customer_id);
        $data['department']=Department::find($report->department_id);
        // return $data;

        $pdf = PDF::loadView('pdf.document', $data);
        $pdf->setPaper('A4', 'portrait');
        return $pdf->stream('document.pdf');
    }

    function getCompanyDetails($department,$type)
    {


        switch ($type) {
            case 1:
                $typeStr = 'Invoice';
                break;
            case 2:
                $typeStr = 'Quotation';
                break;
            case 3:
                $typeStr = 'Proforma';
                break;
            case 4:
                $typeStr = 'Receipt';
                break;
            default:
                // Default case if type is not 1, 2, 3, or 4
                break;
        }

        $data['type']=$typeStr;

        return $data;


    }

    public function send_mail($id)
    {

      try {


        $data = [];

        $report = Report::find($id);
        $report->invoice_type = $this->getCompanyDetails($report->department_id, $report->report_type)['type'];

        $data['report'] = $report;
        $data['projects'] = ProjectReport::where('report_id', $id)->leftJoin('projects', 'projects.id', 'project_reports.project_id')->get();
        $data['customer'] = Customer::find($report->customer_id);
        $data['department'] = Department::find($report->department_id);
        $to_email=$data['customer']->email;

        $pdf = PDF::loadView('pdf.document', $data);
        $pdf->setPaper('A4', 'portrait');

        // // Send email with PDF attachment
        Mail::send([], [], function ($message) use ($pdf, $report,$to_email) {
            $message->to($to_email)
                    ->subject($report->invoice_type)
                    ->attachData($pdf->output(), 'document.pdf');
        });


                       Alert::success('Email Sent', 'Email sent with PDF attachment.,Invoice send Successfully');

                            return redirect()->route('manage.invoice');

        } catch (\Exception $e) {
            return "Email could not be sent. Error: " . $e->getMessage();
        }


    }

}
