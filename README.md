# Documentation
Whole api module is created on `sqliter` for testing purpose.

## Base Url
[http://127.0.0.1:8000/api/](http://127.0.0.1:8000/api/)

### POST -> register
[http://127.0.0.1:8000/api/register](http://127.0.0.1:8000/api/register)
**Body** : form-data
 - email -> test11@example.com 
 - name -> salim 
 - password -> password 
 - password_confirmation -> password
 
 **Response**
```
{
"status":  "success",
"message":  "User registered successfully",
"access_token":  "7|Nzqe5kgZ06PTALYAvOKCUUbCSFof3EzhAQhOWnvh27fadc25",
"token_type":  "Bearer"
}
```

### POST -> login
[http://127.0.0.1:8000/api/login](http://127.0.0.1:8000/api/login)
**Body** -> form-data
 - email -> test@example.com
 - password -> password
 
 **Response**
```
{
"status":  "success",
"message":  "Login successful",
"access_token":  "9|4WARrAiCJfNBMhxilFtQZTP4SQyuwAy3quOPjMzJ8b456e4b",
"token_type":  "Bearer"
}
```

### POST -> logout
[http://127.0.0.1:8000/api/logout](http://127.0.0.1:8000/api/logout)
**AuthorizationBearer Token** -> Token
 
 **Response**
```
{
"status":  "success",
"message":  "Logged out successfully"
}
```


### POST -> shorter
Create url shortener.
[http://127.0.0.1:8000/api/shorter](http://127.0.0.1:8000/api/shorter)
**AuthorizationBearer Token** -> Token
**Body** -> form-data
- original_url -> www.facebook.com
 
 **Response**
```
{
"user_id":  1,
"original_url":  "https://www.facebook.com",
"short_code":  "rIeZRa",
"updated_at":  "2025-12-30T21:47:46.000000Z",
"created_at":  "2025-12-30T21:47:46.000000Z",
"id":  2
}
```

### GET ->urls
Get all urls.
[http://127.0.0.1:8000/api/urls](http://127.0.0.1:8000/api/urls)
**AuthorizationBearer Token** -> Token
 
 **Response**
```
[
	{
		"id":  1,
		"user_id":  1,
		"original_url":  "https://www.facebook.com",
		"short_code":  "ogcOvE",
		"created_at":  "2025-12-30T20:12:16.000000Z",
		"updated_at":  "2025-12-30T20:12:16.000000Z"
	},
	{
		"id":  2,
		"user_id":  1,
		"original_url":  "https://www.facebook.com",
		"short_code":  "rIeZRa",
		"created_at":  "2025-12-30T21:47:46.000000Z",
		"updated_at":  "2025-12-30T21:47:46.000000Z"
	}
]
```

### GET -> url
Get user's urls.
[http://127.0.0.1:8000/api/url](http://127.0.0.1:8000/api/url)
**AuthorizationBearer Token** -> Token
 
 **Response**
```
[
	{
		"id":  1,
		"user_id":  1,
		"original_url":  "https://www.facebook.com",
		"short_code":  "ogcOvE",
		"created_at":  "2025-12-30T20:12:16.000000Z",
		"updated_at":  "2025-12-30T20:12:16.000000Z"
	},
	{
		"id":  2,
		"user_id":  1,
		"original_url":  "https://www.facebook.com",
		"short_code":  "rIeZRa",
		"created_at":  "2025-12-30T21:47:46.000000Z",
		"updated_at":  "2025-12-30T21:47:46.000000Z"
	}
]
```



 **Invalid response for token**
```
{
"status":  "error",
"code":  401,
"message":  "Token missing or invalid"
}
```
