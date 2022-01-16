# PDF mailing API
[![GitHub license](https://img.shields.io/github/license/codeigniter4/CodeIgniter4)](https://github.com/GroovyHooked/exoDevOps/blob/main/LICENSE)
[![contributions welcome](https://img.shields.io/badge/contributions-welcome-brightgreen.svg?style=flat)](https://github.com/GroovyHooked/exoDevOps/pulls)
<br>

You will find this documentation on `http://localhost:8080/`
## Two endpoints are available
### - First Endpoint
#### Team PDF 
`http://localhost:8080/path`

POST request to send the path of the PDF and email of the user in Json format. <br>
Here is the format to use: 
```
{ 
    "path": "https://www.orimi.com/pdf-test.pdf", 
    "mail": "pierremartin@gmail.com"
 }
```

### - Second Endpoint</h4>
#### Team billing
`http://localhost:8080/userdata`

POST request to send the user data in Json format. <br>
Here is the format to use: 
```
{
    "nom": "Martin",
    "prenom": "pierre",
    "mail": "pierremartin@gmail.com"
}
```

🚀 Once all data concerning the customer will be recovered, the email will be sent.

