<?php


$token = "5301325420:AAHNJxE45mRy8rCCUyssPWFzBZ8chzX0f4I";
define('API_KEY',$token);
echo file_get_contents("https://api.telegram.org/bot" . API_KEY . "/setwebhook?url=" . $_SERVER['SERVER_NAME'] . "" . $_SERVER['SCRIPT_NAME']);
            function bot($method,$datas=[]){
    $url = "https://api.telegram.org/bot".API_KEY."/".$method;
$ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
    $res = curl_exec($ch);
    if(curl_error($ch)){
        var_dump(curl_error($ch));
    }else{
        return json_decode($res);
    }
}
function SendChatAction($chat_id, $action)
{
    return bot('sendChatAction', [
        'chat_id' => $chat_id,
        'action' => $action
    ]);
}
function SendMessage($chat_id, $text, $parse_mode = "MARKDOWN", $disable_web_page_preview = true, $reply_to_message_id = null, $reply_markup = null)
{
    return bot('sendMessage', [
        'chat_id' => $chat_id,
        'text' => $text,
        'parse_mode' => $parse_mode,
        'disable_web_page_preview' => $disable_web_page_preview,
        'disable_notification' => false,
        'reply_to_message_id' => $reply_to_message_id,
        'reply_markup' => $reply_markup
    ]);
}



$update = json_decode(file_get_contents('php://input'));
if($update->message){
	$message = $update->message;
$message_id = $update->message->message_id;
$username = $message->from->username;
$chat_id = $message->chat->id;
$title = $message->chat->title;
$text = $message->text;
$user = $message->from->username;
$name = $message->from->first_name;
$name3 = $message->from->last_name;
$from_id = $message->from->id;
}
if($update->callback_query){
$data = $update->callback_query->data;
$chat_id = $update->callback_query->message->chat->id;
$title = $update->callback_query->message->chat->title;
$message_id = $update->callback_query->message->message_id;
$name = $update->callback_query->message->chat->first_name;
$user = $update->callback_query->message->chat->username;
$from_id = $update->callback_query->from->id;
}
if($update->edited_message){
	$message = $update->edited_message;
	$message_id = $message->message_id;
$username = $message->from->username;
$chat_id = $message->chat->id;
$chat_id = $message->chat->id;
$text = $message->text;
$user = $message->from->username;
$name = $message->from->first_name;
$from_id = $message->from->id;
	}
	if($update->channel_post){
	$message = $update->channel_post;
	$message_id = $message->message_id;
$chat_id = $message->chat->id;
$text = $message->text;
$user = $message->chat->username;
$title = $message->chat->title;
$name = $message->author_signature;
$from_id = $message->chat->id;
	}
	if($update->edited_channel_post){
	$message = $update->edited_channel_post;
	$message_id = $message->message_id;
$chat_id = $message->chat->id;
$text = $message->text;
$user = $message->chat->username;
$name = $message->author_signature;
$from_id = $message->chat->id;
	}
	if($update->inline_query){
		$inline = $update->inline_query;
		$message = $inline;
		$user = $message->from->username;
$name = $message->from->first_name;
$from_id = $message->from->id;
$query = $message->query;
$text = $query;
		}
	if($update->chosen_inline_result){
		$message = $update->chosen_inline_result;
		$user = $message->from->username;
$name = $message->from->first_name;
$from_id = $message->from->id;
$inline_message_id = $message->inline_message_id;
$message_id = $inline_message_id;
$text = $message->query;
$query = $text;
		}
		$tc = $update->message->chat->type;
		$re = $update->message->reply_to_message;
		$re_id = $update->message->reply_to_message->from->id;
$re_user = $update->message->reply_to_message->from->username;
$re_name = $update->message->reply_to_message->from->first_name;
$re_messagid = $update->message->reply_to_message->message_id;
$re_chatid = $update->message->reply_to_message->chat->id;
$photo = $message->photo;
$video = $message->video;
$sticker = $message->sticker;
$file = $message->document;
$audio = $message->audio;
$voice = $message->voice;
$caption = $message->caption;
$photo_id = $message->photo[back]->file_id;
$video_id= $message->video->file_id;
$sticker_id = $message->sticker->file_id;
$file_id = $message->document->file_id;
$music_id = $message->audio->file_id;
$forward = $message->forward_from_chat;
$forward_id = $message->forward_from_chat->id;
$title = $message->chat->title;
if($re){
	$forward_type = $re->forward_from->type;
$forward_name = $re->forward_from->first_name;
$forward_user = $re->forward_from->username;
	}else{
$forward_type = $message->forward_from->type;
$forward_name = $message->forward_from->first_name;
$forward_user = $message->forward_from->username;
$forward_id = $message->forward_from->id;
if($forward_name == null){
	$forward = $message->forward_from_chat;
$forward_id = $message->forward_from_chat->id;
$forward_title = $message->forward_from_chat->title;
	}
}

$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$chat_id = $message->chat->id;
$text = $message->text;
$chat_id2 = $update->callback_query->message->chat->id;
$message_id = $update->callback_query->message->message_id;
$data = $update->callback_query->data;
$from_id = $message->from->id;
$ch1 = file_get_contents("https://api.telegram.org/bot".API_KEY."/getChatMember?chat_id=@set_Web&user_id=$from_id");
$ch2 = file_get_contents("https://api.telegram.org/bot".API_KEY."/getChatMember?chat_id=@touch_t&user_id=$from_id");
$check_token = file_get_contents("https://api.telegram.org/bot$text/getWebhookInfo");
$check = json_decode($check_token);
$get_file = file_get_contents('hackeronion.php');
$get_done = file_get_contents('make/ex.txt');
$done = explode("\n", $get_done);
$get_id = file_get_contents('make/make.txt');
$getid = explode("\n", $get_id);
$mid = $message->message_id;



mkdir("data");
$Elalda8 = json_decode(file_get_contents("data/bot.json"),true);
#--------(Elalda8)--------#
$sudo = "??????????";
$malke = $Elalda8['malk'];
if(!$malke){$malkei = "$sudo";}
elseif($malke){$malkei = "$malke";}
$admin = $malke;
$Dev = array("$admin","$sudo");
$Dev = array("$malkei","$sudo");
$userDev = json_decode(file_get_contents("http://api.telegram.org/bot$token/getChat?chat_id=$Dev[1]"))->result->username;
$nameDev = json_decode(file_get_contents("http://api.telegram.org/bot$token/getChat?chat_id=$Dev[1]"))->result->first_name;
#--------(Elalda8)--------#
$members = $Elalda8['members'];
$md3 = count($Elalda8['members']);
if($tc == 'private' and !in_array($from_id,$members)){
$Elalda8['members'][] = $from_id;
file_put_contents("data/bot.json",json_encode($Elalda8));
}
#--------(Elalda8)--------#
$setch = $Elalda8["chall"];
if($text == "/start" and $Elalda8['joenall'] == "off"){
if(!in_array($from_id,$Dev)){
$join = file_get_contents("https://api.telegram.org/bot$token/getChatMember?chat_id=@$setch&user_id=".$from_id);
if($message && (strpos($join,'"status":"left"') or strpos($join,'"Bad Request: USER_ID_INVALID"') or strpos($join,'"status":"kicked"'))!== false){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"?????????????? ??????????.
?????????? ?????????? ?????????????? ??????????.
???????????? ?????? ???????????????? ??????????.
?????????????????? ??? [@$setch]",
'parse_mode'=>'markdown','reply_to_message_id'=>$message->message_id,
]);
exit();
}
}
}


if($text == '/start' and !in_array($from_id, $getid) and !strpos($ch1 , '"status":"left"') !== false){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>'???????? ???? ???? ?????? ?????????? ?????????? ',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'?????????? ??????  ','callback_data'=>'maka']],

[['text'=>'?????? ?????????? ????','callback_data'=>'delete']],

]
])
]);
}

if($data == 'maka' and !in_array($chat_id2,$done) and !strpos($ch1 , '"status":"left"') !== false){
file_put_contents('make/make.txt', "\n" . $chat_id2 . "\n",FILE_APPEND);    
bot('editMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id,
'text'=>'???? ???????????? ???? ???????? ?????????? ???????? ???',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'?????????? ???','callback_data'=>'cancle']]
]
])
]);
}

if($data == 'maka' and in_array($chat_id2,$done) and !strpos($ch1 , '"status":"left"') !== false){

bot('answerCallbackQuery',[
'callback_query_id'=>$update->callback_query->id,
'message_id'=>$message_id,
'text'=>'???? ?????????? ??? ?????????? ???????? ???? ??????  ',
 'show_alert'=>true
 ]);      
}


if($text and in_array($from_id, $getid) and $check->ok == "true"){

for($i = $mid - 3; $i < $mid; $i++){
bot('deleteMessage',[
'chat_id'=>$chat_id,
'message_id'=>$i
]);
}

$str = str_replace($from_id, '', $get_id);    

file_put_contents('make/make.txt', $str);    

file_put_contents('make/ex.txt', $from_id . "\n", FILE_APPEND);
    
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>'???? ??? ?????????? ?????????? ???',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>'???????????? ???????????????? ???????' , 'callback_data'=>"home"]
],
]
])

]); 


mkdir("bots/$from_id");

file_put_contents("bots/$from_id/info.txt",$text . "\n" . $from_id);

file_put_contents("bots/$from_id/bot.php", $get_file);

file_put_contents("bots/$from_id/chat.txt", $from_id . "\n");

file_put_contents("bots/$from_id/welcome.txt", '???????? ???? ???? ?????? ??????????????' . "\n");


file_get_contents("https://api.telegram.org/bot$text/setwebhook?url=https://oniomhost.000webhostapp.com/bots/$from_id/bot.php");


}
if ($message && in_array($from_id,$Elalda8['ban'])){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"???????????????? - [$name](tg://user?id=$from_id)
?????????? ?????? ?????????? ???? ?????? ????????????",
'parse_mode'=>"Markdown",
'reply_to_message_id'=>$message->message_id,
]);
}
#--------(Elalda8)--------#
$d8 = $Elalda8['bots'];
if($message and $d8 == "???" and $from_id != $admin2){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"?????????????? ???? ?????????? ??????????
?????????????? ?????????? ?????????? ???????? ??????????????
",
'parse_mode'=>"Markdown",
'reply_to_message_id'=>$message->message_id,
]);
exit();
}
#--------(Elalda8)--------#
if( $text=="/start" &&  $tc == "private" or $text=="???. ????????" &&  $tc == "private" ){
if (in_array($from_id,$Dev)) {
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"?????????????????? ??? [$name](tg://user?id=$from_id)
?????????????? ?????????? ???????????????? 
???????????????? ???????? ?? ???? ?????????????? ????????????????",
'parse_mode'=>"markdown",
'disable_web_page_preview'=>true,
'reply_to_message_id'=>$message->message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"???. ??????????????????"],['text'=>"???. ?????????? ??????????????????"]],
[['text'=>"???. ?????????? ??????????"]],
[['text'=>"???. ??????????"],['text'=>"???. ??????????"]],
[['text'=>"???. ?????????? ??????????"]],
[['text'=>"???. ???????? ????????????????"],['text'=>"???. ?????? ????????????????"]],
[['text'=>"???. ?????? ????????????????"]],
[['text'=>"???. ?????? ??????????????"],['text'=>"???. ?????? ??????????????"]],
[['text'=>"???. ??????????????????"],['text'=>"???. ?????? ??????????????????"]],
[['text'=>"???. ?????????? ??????????????"],['text'=>"???. ?????????? ??????????????"]],
[['text'=>"???. ?????????? ??????????????"],['text'=>"???. ?????????? ??????????????"]],
],
'resize_keyboard'=>true
])
]);
}
}
#--------(Elalda8)--------#
if( $text=="???. ?????? ????????????????" &&  $tc == "private"){
if (in_array($from_id,$Dev)) {
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"?????????????????? ??? [$name](tg://user?id=$from_id)
?????????????? ?????????? ???????????????? ????????????????
",
'parse_mode'=>"markdown",
'disable_web_page_preview'=>true,
'reply_to_message_id'=>$message->message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"???. ?????? ????????????????"],['text'=>"???. ?????? ????????????????"]],
[['text'=>"???. ???????? ????????????????"]],
[['text'=>"???. ?????????? ????????????????"],['text'=>"???. ?????????? ????????????????"]],
],
'resize_keyboard'=>true
])
]);
}
}
#--------(Elalda8)--------#
if (in_array($from_id,$Dev)) {
if($text == "??????????" or $text == "???. ??????????"){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"?????????????? ???????????? ???????? ?????????? 
???????????????????????? - $md3",
'parse_mode'=>"markdown",
'disable_web_page_preview'=>true,
'reply_to_message_id'=>$message->message_id, 
]);
$Elalda8['data'] = "okoo";
file_put_contents("data/bot.json",json_encode($Elalda8));
}
$mmdr = $Elalda8['members'];
if($message and $text != "?????????? ??????" and $text != "?????????? ????????????" and $text != "??????????" and $text != "??????????" and $text != "?????????? ????????????" and $text != "???. ??????????" and $text != "???. ??????????" and $text != "???. ?????????? ????????????" and $text != "???. ?????????? ????????????" and $text != "???. ?????????? ??????" and $text != "???. ?????????? ??????" and $text != "???. ?????????? ??????????" and $Elalda8['data'] == "okoo" and in_array($from_id,$Dev)){
bot("sendmessage",[
"chat_id"=>$chat_id,
"text"=>'?????????? ?????????????? ?????????? ??????????',
'parse_mode'=>"markdown",
'disable_web_page_preview'=>true,
'reply_to_message_id'=>$message->message_id, 
]);
for($i=0;$i<count($mmdr); $i++){
bot('forwardMessage', [
'chat_id'=>$mmdr[$i],
'from_chat_id'=>$from_id,
'message_id'=>$message->message_id
]);
$Elalda8['data'] = "stop";
file_put_contents("data/bot.json",json_encode($Elalda8));
}
}
}
#----------(Elalda8)----------#
if (in_array($from_id,$Dev)) {
if($text == "??????????" or $text == "???. ??????????"){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"?????????????? ???????????? ???????? ?????????? 
???????????????????????? - $md3",
'parse_mode'=>"markdown",
'disable_web_page_preview'=>true,
'reply_to_message_id'=>$message->message_id, 
]);
$Elalda8['data'] = "okkoo";
file_put_contents("data/bot.json",json_encode($Elalda8));
}
$mmdrr = $Elalda8['members'];
if($message and $text != "?????????? ??????" and $text != "?????????? ????????????" and $text != "??????????" and $text != "??????????" and $text != "?????????? ????????????" and $text != "???. ??????????" and $text != "???. ??????????" and $text != "???. ?????????? ????????????" and $text != "???. ?????????? ????????????" and $text != "???. ?????????? ??????" and $text != "???. ?????????? ??????" and $text != "???. ?????????? ??????????" and $Elalda8['data'] == "okkoo" and in_array($from_id,$Dev)){
bot("sendmessage",[
"chat_id"=>$chat_id,
"text"=>'?????????? ?????????????? ??????????',
'parse_mode'=>"markdown",
'disable_web_page_preview'=>true,
'reply_to_message_id'=>$message->message_id, 
]);
for($i=0;$i<count($mmdrr); $i++){
bot('sendMessage', [
'chat_id'=>$mmdrr[$i],
'text'=>"$text",
'parse_mode'=>"MARKDOWN",
'parse_mode'=>"HTML",
'disable_web_page_preview'=>true,
]);
$Elalda8['data'] = "stop";
file_put_contents("data/bot.json",json_encode($Elalda8));
}
}
}
#----------(Elalda8)----------#
if($text == "???. ?????????? ??????????????????"){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"?????????? ?????????? ???????? ??????????????????",
'parse_mode'=>"markdown",
'disable_web_page_preview'=>true,
'reply_to_message_id'=>$message->message_id, 
]);
$Elalda8['members'] = 0;
file_put_contents("data/bot.json",json_encode($Elalda8));
}
#----------(Elalda8)----------#
if($text == "?????? ????????????????" or $text == "???. ?????? ????????????????"){
if (in_array($from_id,$Dev)) {
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"*?????????????? ???????? ???????????? ?????? @ .*",'parse_mode'=>"markdown",'disable_web_page_preview'=>true,
'reply_to_message_id'=>$message_id,
]);
$Elalda8["addch"] = "$from_id";
file_put_contents("data/bot.json",json_encode($Elalda8));
}
}
elseif($text and $Elalda8["addch"]=="$from_id"){
if(preg_match('/([a-z])/i',$text)){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"*
?????????? ?????? ???????? ???????????????? ???????????????? .
*",'parse_mode'=>"markdown",'disable_web_page_preview'=>true,
'reply_to_message_id'=>$message_id,
]);
$Elalda8["addch"] = "done";
$Elalda8["chall"] = "$text";
file_put_contents("data/bot.json",json_encode($Elalda8));
}
}
if($text == "?????? ????????????????" or $text == "???. ?????? ????????????????"){
if (in_array($from_id,$Dev)) {
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"*?????????? ?????? ???????? ???????????????? ???????????????? .*",'parse_mode'=>"markdown",'disable_web_page_preview'=>true,
'reply_to_message_id'=>$message_id,
]);
$Elalda8["chall"] = "Done";
$Elalda8['joenall'] = "on";
file_put_contents("data/bot.json",json_encode($Elalda8));
}
}
$chall = $Elalda8["chall"];
if($text == "???????? ????????????????" or $text == "???. ???????? ????????????????" and $Elalda8["chall"] != "Done"){
if (in_array($from_id,$Dev)) {
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"*?????????????? ???????? ???????????????? ???????????????? : @$chall .*",'parse_mode'=>"markdown",'disable_web_page_preview'=>true,
'parse_mode'=>"Markdown",
'reply_to_message_id'=>$message->message_id,
]);
}
}
if($text == "???????? ????????????????" or $text == "???. ???????? ????????????????" and $Elalda8["chall"] == "Done"){
if (in_array($from_id,$Dev)) {
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"*?????????????? ???????? ???????????????? ???????????????? : ???????????? ???????? .*",'parse_mode'=>"markdown",'disable_web_page_preview'=>true,
'parse_mode'=>"Markdown",
'reply_to_message_id'=>$message->message_id,
]);
}
}
#----------(Elalda8)----------#
if($text == "?????????? ????????????????" or $text == "???. ?????????? ????????????????"){
if (in_array($from_id,$Dev)) {
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"??????*????????????* ??? [$name](tg://user?id=$from_id)\n??????*?????? ?????????? ???????????????? ????????????????*",
'parse_mode'=>"markdown",'disable_web_page_preview'=>true,
'reply_to_message_id'=>$message_id,
'reply_markup'=>$inlinebutton,
 ]);
$Elalda8['joenall'] = "off";
file_put_contents("data/bot.json",json_encode($Elalda8));
}
}
if($text == "?????????? ????????????????" or $text == "???. ?????????? ????????????????"){
if (in_array($from_id,$Dev)) {
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"??????*????????????* ??? [$name](tg://user?id=$from_id)\n??????*?????? ?????????? ???????????????? ????????????????*",
'parse_mode'=>"markdown",'disable_web_page_preview'=>true,
'reply_to_message_id'=>$message_id,
'reply_markup'=>$inlinebutton,
 ]);
$Elalda8['joenall'] = "on";
file_put_contents("data/bot.json",json_encode($Elalda8));
}
}
#----------(Elalda8)----------#
if($text == "???. ??????????????????"){
if (in_array($from_id,$Dev)) {
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"?????????????? ???????????????????? ???????? ???? ????????
???????????????????????? - $md3",
'parse_mode'=>"markdown",
'disable_web_page_preview'=>true,
'reply_to_message_id'=>$message->message_id, 
]);
}
}
#----------(Elalda8)----------#
$start = $Elalda8['start'];
$startt = $Elalda8['startt'];
if($text=="???????? ????????????????" or $text=="???. ???????? ????????????????"){
if(in_array($from_id,$Dev)){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
???????????????? ??? [$name](tg://user?id=$from_id)
?????????????? ???? ???????????? ?????????? ????????????????
",
'reply_to_message_id'=>$message->message_id,
'parse_mode'=>"MarkDown",
]);
$Elalda8['start'] = "ok_start";
$Elalda8['startt'] = "$from_id";
file_put_contents("data/bot.json",json_encode($Elalda8));
}
}
if($text and $start == "ok_start" and $startt == $from_id){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
?????????????????? ??? [$name](tg://user?id=$from_id)
?????????? ???????? ?????????? ???????????????? ??????????
",
'reply_to_message_id'=>$message->message_id,
'parse_mode'=>"MarkDown",
]);
$Elalda8['okstart'] = $text;
$Elalda8['start'] = "on";
file_put_contents("data/bot.json",json_encode($Elalda8));
}
if($text=="?????? ????????????????" or $text=="???. ?????? ????????????????"){
if(in_array($from_id,$Dev)){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
???????????????? ??? [$name](tg://user?id=$from_id)
?????????? ?????? ?????????? ????????????
?????????? ?????????? ?????????? ????????????
",
'reply_to_message_id'=>$message->message_id,
'parse_mode'=>"MarkDown",
]);
$Elalda8['okstart'] = null;
file_put_contents("data/bot.json",json_encode($Elalda8));
}
}
#----------(Elalda8)----------#
$okstart = $Elalda8['okstart'];
if($text=="/start" and $Elalda8['okstart'] != null){
if($tc == "private"){
if( !in_array($from_id,$Dev)){
$okstart = str_replace('#name',$name,$okstart);
$okstart = str_replace('#bot',$namebot,$okstart);
$okstart = str_replace('#id',$from_id,$okstart);
$okstart = str_replace('#user',$user,$okstart);
$okstart = str_replace('#dev',[$DevUser],$okstart);
bot('sendmessage',['chat_id'=>$chat_id,'text'=>"$okstart",
'reply_to_message_id'=>$message_id,
'parse_mode'=>"markdown",'disable_web_page_preview'=>true,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"???. ( $nameDev ) .???", "url"=>"tg://user?id=$Dev[1]"]],
]])
]);
exit();
}
}
}
if($text == "/start" and $Elalda8['okstart'] == null){
if($tc == "private"){
if( !in_array($from_id,$Dev)){
bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"??????*??????????* ??? [$name](tg://user?id=$from_id)
??????*???????? ?????? ???? ??????  ???????? ?????????? ??????????*",
'reply_to_message_id'=>$message_id,
'parse_mode'=>"markdown",'disable_web_page_preview'=>true,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"???. ( $nameDev ) .???", "url"=>"tg://user?id=$Dev[1]"]],
]])
]);
}
}
}
#----------(Elalda8)----------#
$malkbot = $Elalda8['malkbot'];
$malkkbot = $Elalda8['malkkbot'];
if($re and $text=="?????? ??????????????"){
if(in_array($from_id,$Dev)){
bot('sendmessage',[
            'chat_id'=>$re_id,
            'text'=>"
?????????? ?????? ?????????? ?????????? ???????? 
?????????????????? ??? [$name](tg://user?id=$from_id)
?????????????? ??? /start 
?????????????????? ???? ?????????? ????????????
",'parse_mode'=>"markdown",'disable_web_page_preview'=>true,
]);
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
?????????????????? ??? [$name](tg://user?id=$from_id)
?????????? ???????? ???????????? ???????? ??????????
",
'reply_to_message_id'=>$message->message_id,
'parse_mode'=>"MarkDown",
]);
$Elalda8['malk'] = "$re_id";
file_put_contents("data/bot.json",json_encode($Elalda8));
exit();
}
}
if($text=="?????? ??????????????" or $text=="???. ?????? ??????????????"){
if(in_array($from_id,$Dev)){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
???????????????? ??? [$name](tg://user?id=$from_id)
?????????????? ???? ???????????? ???????? ????????????
",
'reply_to_message_id'=>$message->message_id,
'parse_mode'=>"MarkDown",
]);
$Elalda8['malkbot'] = "ok_malk";
$Elalda8['malkkbot'] = "$from_id";
file_put_contents("data/bot.json",json_encode($Elalda8));
}
}
if($text and preg_match('/([0-9])/i',$text) and $malkbot == "ok_malk" and $malkkbot == $from_id){
bot('sendmessage',[
            'chat_id'=>$text,
            'text'=>"
?????????? ?????? ?????????? ?????????? ???????? 
?????????????????? ??? [$name](tg://user?id=$from_id)
?????????????? ??? /start 
?????????????????? ???? ?????????? ????????????
",'parse_mode'=>"markdown",'disable_web_page_preview'=>true,
]);
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
?????????????????? ??? [$name](tg://user?id=$from_id)
?????????? ???????? ???????????? ???????? ??????????
",
'reply_to_message_id'=>$message->message_id,
'parse_mode'=>"MarkDown",
]);
$Elalda8['malk'] = $text;
$Elalda8['malkbot'] = "on";
file_put_contents("data/bot.json",json_encode($Elalda8));
}
if($text=="?????? ???????????? ????????????" or $text=="???. ?????? ??????????????"){
if(in_array($from_id,$Dev)){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
???????????????? ??? [$name](tg://user?id=$from_id)
?????????? ?????? ????????????
?????????? ?????????? ???????????? ??????????????
",
'reply_to_message_id'=>$message->message_id,
'parse_mode'=>"MarkDown",
]);
$Elalda8['malk'] = null;
file_put_contents("data/bot.json",json_encode($Elalda8));
}
}
#----------(Elalda8)----------#
$ban_id = $message->reply_to_message->forward_from->id;
if($ban_id && $text == "??????"){
$apiban = json_decode(file_get_contents("http://api.telegram.org/bot$token/getChat?chat_id=$ban_id"));
$banuser =$apiban->result->username;
$banname =$apiban->result->first_name;
$banid =$apiban->result->id;
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"???????????????? - [$banname](tg://user?id=$banid)
?????????? ?????????????? ??????????????",
'parse_mode'=>"Markdown",
'reply_to_message_id'=>$message->message_id,
]);
$Elalda8['ban'][] = "$ban_id";
file_put_contents("data/bot.json",json_encode($Elalda8));
}
if ($ban_id && $text == "?????????? ??????"){
$apiban = json_decode(file_get_contents("http://api.telegram.org/bot$token/getChat?chat_id=$ban_id"));
$banuser =$apiban->result->username;
$banname =$apiban->result->first_name;
$banid =$apiban->result->id;
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
???????????????? - [$banname](tg://user?id=$banid)
?????????? ?????????????? ?????????????? ??????????????
",
'parse_mode'=>"Markdown",
'reply_to_message_id'=>$message->message_id,
]);
$key = array_search($ban_id,$Elalda8["ban"]);
unset($Elalda8["ban"][$key]);
$Elalda8["ban"] = array_values($Elalda8["ban"]); 
$Elalda8 = json_encode($Elalda8,true);
file_put_contents("data/bot.json",$Elalda8);
}
#----------(Elalda8)----------#
if($text=="???. ??????????????????" and $Elalda8['ban'] != null){
$banlast = $Elalda8['ban'];
for($z = 0;$z <= count($banlast)-1;$z++){
$apiban = json_decode(file_get_contents("http://api.telegram.org/bot$token/getChat?chat_id=$banlast[$z]"));
$banuser =$apiban->result->username;
$banname =$apiban->result->first_name;
$banid =$apiban->result->id;
$result = $result."?????? $z ??? [$banname](https://t.me/$banuser) - $banid"."\n";
}
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"?????????????? ?????????? ?????????????????? : 
?????? ??? ??? ??? ??? ??? ??????
$result",
'parse_mode'=>"markdown",
'disable_web_page_preview'=>true,
'reply_to_message_id'=>$message->message_id,
 ]);
exit();
}
if($text=="???. ??????????????????" and $Elalda8['ban'] == null){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
???????????????? ??? [$name](tg://user?id=$from_id)
?????????????????? ?????????? ??????????
",
'reply_to_message_id'=>$message->message_id,
'parse_mode'=>"MarkDown",
]);
}
if($text == "???. ?????? ??????????????????" and $from_id == $admin2){
bot("SendMessage",[
'chat_id'=>$chat_id,
'text'=>"?????????????????? ??? [$name](tg://user?id=$from_id)
?????? ???? ?????? ?????????? ??????????????????
",'parse_mode'=>"MARKDOWN",
'reply_to_message_id'=>$message_id,
'disable_web_page_preview'=>true,
]);
$Elalda8['ban'] = null;
file_put_contents("data/bot.json",json_encode($Elalda8));
}
#----------(Elalda8)----------#
$d6 = $Elalda8['sarat'];
if($text == "???. ?????????? ??????????????" and in_array($from_id,$Dev)){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"??????*???? ?????????? ?????????????? ??????????*",
'parse_mode'=>"markdown",
'disable_web_page_preview'=>true,
'reply_to_message_id'=>$message->message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"???. ?????????? ??????????????"]],
[['text'=>"???. ????????"]],
],
'resize_keyboard'=>true
])
]);
$Elalda8['sarat'] = "???";
file_put_contents("data/bot.json",json_encode($Elalda8));
}
if($text == "???. ?????????? ??????????????" and in_array($from_id,$Dev)){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"??????*???? ?????????? ?????????????? ??????????*",
'parse_mode'=>"markdown",
'disable_web_page_preview'=>true,
'reply_to_message_id'=>$message->message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"???. ?????????? ??????????????"]],
[['text'=>"???. ????????"]],
],
'resize_keyboard'=>true
])
]);
$Elalda8['sarat'] = "???";
file_put_contents("data/bot.json",json_encode($Elalda8));
}
#-----------(Elalda8)-----------#
$d7 = $Elalda8['tojahh'];
if($text == "???. ?????????? ??????????????" and in_array($from_id,$Dev)){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"??????*???? ?????????? ?????????????? ??????????*",
'parse_mode'=>"markdown",
'disable_web_page_preview'=>true,
'reply_to_message_id'=>$message->message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"???. ?????????? ??????????????"]],
[['text'=>"???. ????????"]],
],
'resize_keyboard'=>true
])
]);
$Elalda8['tojahh'] = "???";
file_put_contents("data/bot.json",json_encode($Elalda8));
}
if($text == "???. ?????????? ??????????????" and in_array($from_id,$Dev)){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"??????*???? ?????????? ?????????????? ??????????*",
'parse_mode'=>"markdown",
'disable_web_page_preview'=>true,
'reply_to_message_id'=>$message->message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"???. ?????????? ??????????????"]],
[['text'=>"???. ????????"]],
],
'resize_keyboard'=>true
])
]);
$Elalda8['tojahh'] = "???";
file_put_contents("data/bot.json",json_encode($Elalda8));
}
#-----------(Elalda8)-----------#
if($message and $text != "/start" and $from_id != $Dev[1] and $d7 == "???" and !$data){
bot('forwardMessage',[
'chat_id'=>$Dev[1],
'from_chat_id'=>$chat_id,
 'message_id'=>$update->message->message_id,
'text'=>$text,
]);
}
#-----------(Elalda8)-----------#
if($user == null){
$user = "None";
}elseif($user != null){
$user = $user;
}
if($text =='/start' and $from_id !=$Dev[1] and $d6 =="???"){ 
bot('sendmessage',[ 
'chat_id'=>$Dev[1],  
'text'=>"???? ???????? ?????? ???????? ?????? ?????????? ?????? :
?????????? : [$name]
???????????? : [@$user]
???????????? : [$from_id](tg://user?id=$from_id)
??? ??? ??? ???
",  
'parse_mode'=>"MarkDown", 
'disable_web_page_preview'=>true, 
]);  
}
#-----------(Elalda8)-----------#
if($text == "???. ?????????? ??????????" and in_array($from_id,$Dev)){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"??????*???? ?????????? ?????????? ??????????*",
'parse_mode'=>"markdown",
'disable_web_page_preview'=>true,
'reply_to_message_id'=>$message->message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"???. ?????????? ??????????"]],
[['text'=>"???. ????????"]],
],
'resize_keyboard'=>true
])
]);
$Elalda8['bots'] = "???";
file_put_contents("data/bot.json",json_encode($Elalda8));
}
if($text == "???. ?????????? ??????????" and in_array($from_id,$Dev)){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"??????*???? ?????????? ?????????? ??????????*",
'parse_mode'=>"markdown",
'disable_web_page_preview'=>true,
'reply_to_message_id'=>$message->message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"???. ?????????? ??????????"]],
[['text'=>"???. ????????"]],
],
'resize_keyboard'=>true
])
]);
$Elalda8['bots'] = "???";
file_put_contents("data/Elalda8.json",json_encode($Elalda8));
}


if($text and in_array($from_id, $getid) and $check->ok != "true" and !strpos($ch1 , '"status":"left"') !== false){

bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>'???????? ?????????????? ???????????? ?????? ???????? ??????',
'reply_to_message_id'=>$message->message_id,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'?????????? ???','callback_data'=>'cancle']]
]
])
]);
}    

if($data == 'cancle' and in_array($from_id, $getid)){

$str = str_replace($chat_id2, "", $get_id) ;
file_put_contents('make/make.txt', $str);
bot('editMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id,
'text'=>'???????? ???? ???? ?????? ?????????? ?????????? ',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'?????????? ??????  ','callback_data'=>'maka']],

[['text'=>'?????? ?????????? ????','callback_data'=>'delete']],

]    
])
]);
}

if($data == 'home'){
bot('editMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id,
'text'=>'???????? ???? ???? ?????? ?????????? ?????????? ',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'?????????? ??????  ','callback_data'=>'maka']],
[
['text'=>'???????????????????','callback_data'=>'info'],
['text'=>'???????? ?????????? ????','callback_data'=>'buy']

],

[['text'=>'?????? ?????????? ????','callback_data'=>'delete']],


]    
])
]);
}

if($data == 'delete' and in_array($chat_id2,$done)){
bot('editMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id,
'text'=>'???? ?????? ?????????? ?????? ???? ?????? ???????? ?????? ?????????? ????',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>'???? ???', 'callback_data'=>'home'],
['text'=>'?????? ???','callback_data'=>'yesdel'],
]    
]])
]);    
}

if($data == 'yesdel' and in_array($chat_id2, $done)){


bot('editMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id,
'text'=>"???? ???  ?????? ?????????? ?????????? ????",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>'???????????? ???????????????? ???????' , 'callback_data'=>"home"]
]
]
])
]);



$str1 = str_replace($chat_id2, '', $get_done);

file_put_contents('make/ex.txt', $str1);

$get_token = file_get_contents("bots/$chat_id2/info.txt");

$get_url = file_get_contents("https://api.telegram.org/bot$get_token/getWebhookInfo");

$json = json_decode($get_url);

$url = $json->result->url;

file_get_contents("https://https://api.telegram.org/bot$get_token/deletewebhook?url=$url");

unlink("bots/$chat_id2/bot.php");
unlink("bots/$chat_id2/info.txt");

}


if($data == 'delete' and !in_array($chat_id2,$done)){

bot('answerCallbackQuery',[
'callback_query_id'=>$update->callback_query->id,
'message_id'=>$message_id,
'text'=>'???? ?????? ???????????? ?????? ???????? ~????',
 'show_alert'=>true
 ]);  
 
}




if($data == 'info' and in_array($chat_id2,$done)){
    
$get_info = file_get_contents("bots/$chat_id2/info.txt");

$url_info = file_get_contents("https://api.telegram.org/bot$get_info/getMe");

$json_info = json_decode($url_info);

$id = $json_info->result->id;

$user = $json_info->result->username;

$name = $json_info->result->first_name;

if($data == 'info' and !in_array($chat_id2,$done)){
bot('answerCallbackQuery',[
'callback_query_id'=>$update->callback_query->id,
'message_id'=>$message_id,
'text'=>'???? ?????? ???????????? ?????? ???????? ~????',
 'show_alert'=>true
 ]);  
}



} 
