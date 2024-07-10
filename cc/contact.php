<?php
// 检查表单是否提交
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 获取表单数据
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // 收件人邮箱地址
    $to = '1785075972@qq.com';

    // 邮件头部
    $headers = "From: $name <$email>\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=utf-8\r\n";

    // 发送邮件
    $mailSent = mail($to, $subject, $message, $headers);

    // 检查邮件是否发送成功
    if ($mailSent) {
        http_response_code(200); // 成功
        echo json_encode(array('message' => '消息发送成功。'));
    } else {
        http_response_code(500); // 服务器错误
        echo json_encode(array('message' => '发送消息失败。'));
    }
} else {
    http_response_code(403); // 禁止访问
    echo json_encode(array('message' => '禁止访问。'));
}
?>
