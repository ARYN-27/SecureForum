# OWASP Secure Coding Checklist

## 1. Input Validation
- Login
  - Duplicate username not allowed ✔
  - Duplicate password not allowed ✔
  - Duplicate email not allowed ✔

## 2. Output Encoding ❌

## 3. Authentication and Password Management
- Password Hashed (SHA-256) ✔
  - >Require authentication for all pages and resources, except those specifically intended to be public
  - >If your application manages a credential store, it should ensure that only cryptographically strong oneway salted hashes of passwords are stored and that the table/file that stores the passwords and keys is write-able only by the application. (Do not use the MD5 algorithm if it can be avoided) 
  - > Authentication failure responses should not indicate which part of the authentication data was incorrect. For example, instead of "Invalid username" or "Invalid password", just use "Invalid username and/or password" for both. Error responses must be truly identical in both display and source code
  - >Password entry should be obscured on the user's screen. (e.g., on web forms use the input type "password")

## 4. Session Management ❌

## 5. Access Control ✔
- Create Categories [create_cat.php] restricted to admin
  - > Restrict access to protected URLs to only authorized users 

## 6. Cryptographic Practices ❌

## 7. Error Handling and Logging ➖

## 8. Data Protection ➖

## 9. Communication Security ❌

## 10. System Configuration ➖

## 11. Database Security ✔
- >Remove or change all default database administrative passwords. Utilize strong passwords/phrases or implement multi-factor authentication
## 12. File Management ❌

## 13. Memory Management ❌
## 14. General Coding Practices
