<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Documentation</title>
    <style>
        .code{
            background: rgb(238, 238, 238);
            width: 70%;
            padding: 15px;
        }
    </style>
</head>
<body>
<div class="container">
    <h3>Two endpoints are available</h3>
    <div class="endpoint1">
        <h4>- First Endpoint</h4>
        <code>http://localhost:8080/path</code>
        <p>POST request to send the path of the PDF and email of the user in Json format.</p>
        <p>Here is the format you must follow: </p>
        <div class="code">
            <code>
                { <br>
                &#160;&#160;&#160;"path": "https://www.orimi.com/pdf-test.pdf", <br>
                &#160;&#160;&#160;"mail": "thomascariot@gmail.com"<br>
                }
            </code>
        </div>
    </div>
    <div class="endpoint2">
        <h4>- Second Endpoint</h4>
        <code>http://localhost:8080/userdata</code>
        <p>POST request to send the user data in Json format.</p>
        <p>Here is the format you must follow: </p>
        <div class="code">
            <code>
                {<br>
                &#160;&#160;&#160;"nom": "Martin",<br>
                &#160;&#160;&#160;"prenom": "pierre",<br>
                &#160;&#160;&#160;"mail": "pierremartin@gmail.com"<br>
                }
            </code>
        </div>
        <p>🚀 Once all data concerning the costumer will be recovered, the email will be sent.</p>
    </div>
</div>

</body>
</html>