# OWASP Secure Coding Checklist

## 1. Input Validation
- Signup
  - Duplicate username not allowed ✔
  - Duplicate password not allowed ✔
  - Email
    - Duplicate email not allowed ✔
    - Email Sanitized ✔
    - Email Validated ✔
  - Category 
    - Empty Category Name and Category Description not allowed ✔
  - Topic 
    - Empty Topic Subject and Post Content not allowed ✔
  - Reply 
    - Empty Reply not allowed ✔
 
> All validation failures should result in input rejection
> Validate for expected data types 
> If any potentially hazardous characters must be allowed as input, be sure that you implement additional controls like output encoding, secure task specific APIs and accounting for the utilization of that data throughout the application . Examples of common hazardous characters include: < > " ' % ( ) & + \ \' \" 
> Check for null bytes (%00) Current Version (8.0.11) not vulnerable to CVE-2006-7243


## 2. Output Encoding ❌

## 3. Authentication and Password Management
- Password Hashed (SHA-256) ✔
- Password Requirement ✔
  - >Require authentication for all pages and resources, except those specifically intended to be public
  - >If your application manages a credential store, it should ensure that only cryptographically strong oneway salted hashes of passwords are stored and that the table/file that stores the passwords and keys is write-able only by the application. (Do not use the MD5 algorithm if it can be avoided) 
  - > Authentication failure responses should not indicate which part of the authentication data was incorrect. For example, instead of "Invalid username" or "Invalid password", just use "Invalid username and/or password" for both. Error responses must be truly identical in both display and source code
  - >Password entry should be obscured on the user's screen. (e.g., on web forms use the input type "password")
  - >Use only HTTP POST requests to transmit authentication credentials
  - > Enforce password length requirements established by policy or regulation. Eight characters is commonly used, but 16 is better or consider the use of multi-word pass phrases


## 4. Session Management ❌

## 5. Access Control ✔
- Create Categories [create_cat.php] restricted to admin [*for moderation*]
- Create Admin [signup_admin.php] restricted to admin
  - > Restrict access to protected URLs to only authorized users 

## 6. Cryptographic Practices ❌

## 7. Error Handling and Logging ❌

## 8. Data Protection ❌

## 9. Communication Security ❌

## 10. System Configuration ❌

## 11. Database Security ✔
- >Utilize input validation and output encoding and be sure to address meta characters. If these fail, do not run the database command
- >Ensure that variables are strongly typed
- >Use secure credentials for database access
- >Connection strings should not be hard coded within the application. Connection strings should be stored in a separate configuration file on a trusted system and they should be encrypted
- >Remove or change all default database administrative passwords. Utilize strong passwords/phrases or implement multi-factor authentication
## 12. File Management ❌

## 13. Memory Management ❌
## 14. General Coding Practices ❌
