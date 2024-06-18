<!DOCTYPE html>
<html>
<head>
    <title>Chatbot PHP</title>
    <link rel="stylesheet" type="text/css" href="../giao diện/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<?php
    header('Content-Type: text/html; charset=UTF-8');
    // Đảm bảo font chữ
    ?>
    <style>
        @charset "utf-8";
/* CSS Document */
body {
    font-family: 'Times New Roman', Times, serif;
    background-image: url('../../chatbotNPC/img/11.jpg'); /* Thay 'your-background-image.jpg' bằng đường dẫn tới hình nền của bạn */
    background-size: cover;
    background-attachment: fixed;
    margin: 0;
    padding: 0;
}
h1{
    padding-top: 50px;
    text-align: center;
    color: cyan;
    font-size: 50px;
}
#chat-container {
            width: 700px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            background: rgba(255, 255, 255, 0.8);
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }
        #chat-history {
            height: 300px;
            overflow-y: scroll;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            background: #f9f9f9;
            border-radius: 5px;
            margin-bottom: 10px;
        }
        .user-message, .bot-message {
            padding: 10px;
            margin-bottom: 10px;
        }
        .user-message {
            background-color: #f1f1f1;
            text-align: right;
            color: #000;
            padding: 5px;
            margin: 5px 0;
            border-radius: 5px;
        }
        .bot-message {
            background-color: #e6e6e6;
            text-align: left;
            color: #000;
            padding: 5px;
            margin: 5px 0;
            border-radius: 5px;
        }


    </style>
</head>
<body>
    <div class="body">
    <h1>NPC độc quyền</h1>
    <br>
    
    <div id="chat-container">
        <div id="chat-history"></div>
        <input type="text" id="chat-input" placeholder="Nhập câu hỏi của bạn">
        <button id="chat-submit">Gửi</button>
    </div>
    </div>
    <script>
       $(document).ready(function() {
    // Gửi lời chào khi trang được tải
    sendMatma();

// nhấn enter
    $('#chat-input').keyup(function(event) {
        if (event.keyCode === 13) { // Nhấn Enter
            var question = $('#chat-input').val();
            if (question.trim() !== '') {
                $.ajax({
                    type: 'POST',
                    url: 'xl.php',
                    data: {question: question},
                    dataType: 'json',
                    success: function(data) {
                        $('#chat-history').append('<div class="user-message">Bạn: ' + question + '</div>');
                        $('#chat-history').append('<div class="bot-message">Chatbot: ' + data.response + '</div>');
                        $('#chat-input').val('');
                    },
                    error: function() {
                        alert('Đã xảy ra lỗi. Vui lòng thử lại sau.');
                    }
                });
            }
        }
    });
});
//Lấy dữ liệu từ phần nhập và nhấn gửi
$('#chat-submit').click(function() {
        var question = $('#chat-input').val();
        if (question.trim() !== '') {
            $.ajax({
                type: 'POST',
                url: 'xl.php',
                data: {question: question},
                dataType: 'json',
                success: function(data) {
                    $('#chat-history').append('<div class="user-message">Bạn: ' + question + '</div>');
                    $('#chat-history').append('<div class="bot-message">Chatbot: ' + data.response + '</div>');
                    $('#chat-input').val('');
                },
                error: function() {
                    alert('Đã xảy ra lỗi. Vui lòng thử lại sau.');
                }
            });
        }
    });

// gửi lời chào
function sendMatma() {
    $.ajax({
        type: 'POST',
        url: 'xl.php',
        data: {question: 'mật mã'},
        dataType: 'json',
        success: function(data) {
            $('#chat-history').append('<div class="bot-message">Chatbot: ' + data.response + '</div>');
        },
        error: function() {
            console.log('Đã xảy ra lỗi khi gửi lời chào.');
        }
    });
}
    </script>

</body>
</html>
