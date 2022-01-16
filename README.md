# PDF mailing API
[![GitHub license](https://img.shields.io/github/license/codeigniter4/CodeIgniter4)](https://github.com/codeigniter4/CodeIgniter4/blob/develop/LICENSE)
[![contributions welcome](https://img.shields.io/badge/contributions-welcome-brightgreen.svg?style=flat)](https://github.com/codeigniter4/CodeIgniter4/pulls)
<br>

You will find this documentation on `http://localhost:8080/`
## Two endpoints are available
### - First Endpoint
`http://localhost:8080/path`

POST request to send the path of the PDF and email of the user in Json format. <br>
Here is the format you must follow: 
```
{ 
    "path": "https://www.orimi.com/pdf-test.pdf", 
    "mail": "pierremartin@gmail.com"
 }
```

### - Second Endpoint</h4>
`http://localhost:8080/userdata`

POST request to send the user data in Json format. <br>
Here is the format you must follow: 
```
{
    "nom": "Martin",
    "prenom": "pierre",
    "mail": "pierremartin@gmail.com"
}
```

🚀 Once all data concerning the costumer will be recovered, the email will be sent.

