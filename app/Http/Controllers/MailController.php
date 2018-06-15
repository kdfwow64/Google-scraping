<?php
namespace App\Http\Controllers;
 
use App\MailTemplate;
use App\Http\Controllers\Controller;
use App\Mail\DemoEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use DB;
 
class MailController extends Controller
{
    public function send()
    {
        $objDemo = new \stdClass();
        $objDemo->demo_one = 'Demo One Value';
        $objDemo->demo_two = 'Demo Two Value';
        $objDemo->sender = 'SenderUserName';
        $objDemo->receiver = 'ReceiverUserName';
 
        Mail::to("kdfwow64@gmail.com")->send(new DemoEmail($objDemo));
    }
    public function index() {
    	$template = MailTemplate::get(['*'])->first();
    	$template_name = $template['template_name'];
    	$template_text = $template['template_text'];
    	$template_id = $template['id'];
    	return view('mails.main',compact('template_name','template_text','template_id'));
    }

    public function save(Request $request) {
    	$id = $request->input('template_id');
    	$text = $request->input('template_text');
    	$name = $request->input('template_name');
    	DB::update('update mails set template_name = ? , template_text = ? where id = ? ', [$name,$text,$id]);
    //	MailTemplate::where('id',$id)->update(['template_text' => 'aa']);
    	echo 1;
    }
}

