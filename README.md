# Documentation

## Base Url
[http://127.0.0.1:8000/api/](http://127.0.0.1:8000/api/)

### POST -> register
[http://127.0.0.1:8000/api/register](http://127.0.0.1:8000/api/register)
**Body** : form-data
 - email -> test11@example.com 
 - name -> salim 
 - password -> password 
 - password_confirmation -> password

### POST -> login
[http://127.0.0.1:8000/api/login](http://127.0.0.1:8000/api/login)
**Body** -> form-data
 - email -> test@example.com
 - password -> password

### POST -> logout
[http://127.0.0.1:8000/api/logout](http://127.0.0.1:8000/api/logout)
**AuthorizationBearer Token** -> Token


### POST -> shorter
Create url shortener.
[http://127.0.0.1:8000/api/shorter](http://127.0.0.1:8000/api/shorter)
**AuthorizationBearer Token** -> Token
**Body** -> form-data
- original_url -> www.facebook.com

### GET ->urls
Get all urls.
[http://127.0.0.1:8000/api/urls](http://127.0.0.1:8000/api/urls)
**AuthorizationBearer Token** -> Token

### GET -> url
Get user's urls.
[http://127.0.0.1:8000/api/url](http://127.0.0.1:8000/api/url)
**AuthorizationBearer Token** -> Token

