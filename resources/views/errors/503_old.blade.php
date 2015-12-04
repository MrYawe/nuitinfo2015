<!DOCTYPE html>
<html>
    <head>
        <title>Be right back.</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

        <style>
            html, body {
                height: 100%;
                width: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                color: #B0BEC5;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 72px;
                margin-bottom: 40px;
                position: absolute;
                top: 70%;  /* position the top  edge of the element at the middle of the parent */
                left: 51%; /* position the left edge of the element at the middle of the parent */

                transform: translate(-50%, -50%); /* This is a shorthand of */
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <div class="title">Be right back.</div>
            </div>
        </div>
    </body>
</html>
