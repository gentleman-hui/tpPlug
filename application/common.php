<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

use Mailer\Mailer;

// 应用公共文件
/**
 * [sendMail]
 * 函数用途描述: 发送邮件
 * @date:  2018-01-26
 * @author: xiaohui
 * @param: [variable]
 * @param: [type]   $acceptor [接收方邮箱地址]
 * @param: [type]   $title    [邮件标题]
 * @param: [type]   $content  [邮件内容 支持html]
 * @param: [array]  $attachments [邮件附件,多个附件使用数组或者,分割]
 * @return [type]               [description]
 */
function sendMail($acceptor, $title, $content, $attachments = array()) {
    if ($acceptor == '') {
        $reData = array(
            'status' => 0,
            'msg' => '邮件接收方不得为空',
            'data' => ''
        );
        return $reData;
    } else {
        $isMatched = preg_match('/\w[-\w.+]*@([A-Za-z0-9][-A-Za-z0-9]+\.)+[A-Za-z]{2,14}/', $acceptor, $matches);
        if (!$isMatched) {
            $reData = array(
                'status' => 0,
                'msg' => '邮件接收方格式错误',
                'data' => ''
            );
            return $reData;
        }
    }
    if ($title == '') {
        $reData = array(
            'status' => 0,
            'msg' => '邮件标题不得为空',
            'data' => ''
        );
        return $reData;
    }
    if ($content == '') {
        $reData = array(
            'status' => 0,
            'msg' => '邮件内容不得为空',
            'data' => ''
        );
        return $reData;
    }
    $mail = new Mailer();
    try {
        //Server settings
        // $mail->SMTPDebug = 2;                               // Enable verbose debug output
        $mail->isSMTP();                                       // Set mailer to use SMTP
        $mail->Host = 'smtp.qq.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                                // Enable SMTP authentication
        $mail->Username = '1325284158@qq.com';                 // SMTP username
        $mail->Password = 'plscevdlvkcsiehj';                  // SMTP password
        $mail->SMTPSecure = 'ssl';                             // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 465;                                     // TCP port to connect to

        //Recipients
        $mail->setFrom('1325284158@qq.com', '测试ThinkPHP5发送邮件');

        // $mail->addAddress('635981000@qq.com', 'Joe User');     // Add a recipient
        $mail->addAddress($acceptor);               // Name is optional
        // $mail->addReplyTo('info@example.com', 'Information');
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');

        // 添加邮件附件
        if (!empty($attachments)) {
            if (is_array($attachments)) {
                foreach ($attachments as $k => $v) {
                    $mail->addAttachment($v);
                }
            } else {
                if (strpos($attachments, ',') === false) {
                    $mail->addAttachment($attachments);
                } else {
                    $attachmentArr = explode(',', $attachments);
                    foreach ($attachmentArr as $k => $v) {
                        $mail->addAttachment($v);
                    }
                }
            }
        }

        //Attachments  邮件附件
        // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

        //Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = $title;   // 邮件标题
        $mail->Body    = $content;  // 邮件内容
        $mail->AltBody = $content;

        $send_status = $mail->send();
        if ($send_status) {
            $reData = array(
                'status' => 1,
                'msg' => '邮件发送成功',
                'data' => ''
            );
        } else {
            $reData = array(
                'status' => 0,
                'msg' => '邮件发送失败',
                'data' => ''
            );
        }
    } catch (Exception $e) {
        $reData = array(
            'status' => 0,
            'msg' => $mail->ErrorInfo,
            'data' => ''
        );
    }

    return $reData;
}