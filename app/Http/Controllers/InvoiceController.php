<?php

namespace App\Http\Controllers;
use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;
use Mail;
use App\Mail\NotifyMail;
class InvoiceController extends Controller
{
    public function index()
    {
        //get posts
        $invoices = Invoice::latest()->paginate(5);

        //render view with posts
        return view('invoices.index', compact('invoices'));
    }
    public function create()
    {
        return view('Invoices.create');
    }

    /**
     * store
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        //echo "kill here";
        //die();
        //validate form
        
        $this->validate($request, [
            //'image'     => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'namacust'=>'required|min:5',
            'emailcust'=>'required|email',
            'hpcust'=> 'required|min:10',
            'orgcust'=>'required',
            'jenispaket'=>'required',
            'hargafinal'=>'required|min:3->numbers',
            'jumlahpembayaran'=>'required|min:3->numbers',
            'orgcust'=>'required',
           
        ]);
        
        //upload image
       // $image = $request->file('image');
      //  $image->storeAs('public/posts', $image->hashName());

        //create post
        $date_mulai=$request->waktu_ambil." ".$request->jam_mulai;
        $date_selesai=$request->waktu_selesai." ".$request->jam_selesai;
        //$a=DB::raw('to_date(sysdate)');
      //  $a=DB::select(DB::raw('select * from Invoices where year(waktu_ambil)<=now()'));
        $noinvoices="DEWTIN_".Date('Y').str_pad(Invoice::whereYear('created_at','=', Date('Y'))->count(), 4, '0', STR_PAD_LEFT);
        echo $date_selesai;
        
        Invoice::create([
        //    'image'     => $image->hashName(),
            'namacust'     => $request->namacust,
            'hpcust'   => $request->hpcust,
            'orgcust'=>$request->orgcust,
            'emailcust'=>$request->emailcust,
            'orgcust'=>$request->orgcust,
            'jenispaket'=>$request->jenispaket,
            'hargafinal'=>$request->hargafinal,
            'jumlahpembayaran'=>$request->jumlahpembayaran,
            'orgcust'=>$request->orgcust,
            'noinvoice'=>$noinvoices,
            'waktu_ambil'=>$date_mulai,
            'waktu_selesai'=>$date_selesai,
            'keteranganinvoice'=>$request->keteranganinvoice,
            'User'=>"1"
        ]);
        $invoices=Invoice::where('noinvoice',$noinvoices)->get();
        //print_r($invoice);
        //echo($noinvoice);
        //die();
        $data["email"] = "aatmaninfotech@gmail.com";
        $data["title"] = "From ItSolutionStuff.com";
        $data["body"] = "This is Demo";
        $pdf = PDF::loadView('invoices.invoicepdf', compact('invoices'));
        $file=$pdf->output();
        Mail::to('bimamurti@ukrimuniversity.ac.id')->send(new NotifyMail())->attach();
         Mail::send('emails.tinalahMail', $data, function($message)use($data,$file) {
             $message->to('bimamurti@ukrimuniversity.ac.id');
             $message->attachdata($file,'invoice.pdf');
         });    
        return $pdf->download('invoicefile.pdf');
        
        //redirect to index
        //return redirect()->route('invoices.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }
    public function edit(Invoice $invoice)
    {
        return view('invoices.edit', compact('invoice'));
    }
    
    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $post
     * @return void
     */
    public function update(Request $request, Post $post)
    {
        //validate form
        $this->validate($request, [
            'image'     => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'title'     => 'required|min:5',
            'content'   => 'required|min:10'
        ]);

        //check if image is uploaded
        if ($request->hasFile('image')) {

            //upload new image
            $image = $request->file('image');
            $image->storeAs('public/posts', $image->hashName());

            //delete old image
            Storage::delete('public/posts/'.$post->image);

            //update post with new image
            $post->update([
                'image'     => $image->hashName(),
                'title'     => $request->title,
                'content'   => $request->content
            ]);

        } else {

            //update post without image
            $post->update([
                'title'     => $request->title,
                'content'   => $request->content
            ]);
        }

        //redirect to index
        return redirect()->route('posts.index')->with(['success' => 'Data Berhasil Diubah!']);
    }
}
    //
