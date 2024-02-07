# PHP with Twig SSTI Example

This repository provides an example PHP application using Twig templates to illustrate Server-Side Template Injection (SSTI) vulnerabilities and a safe implementation.

## Installation

1. Clone this repository:

```bash
git clone https://github.com/TheWation/PHPSSTI.git
cd PHPSSTI
```

2. Install dependencies:
```bash
composer install
```

## Usage

### Run the Application

Start the PHP application:

```bash
php -S localhost:8000
```

The application will be running at `http://localhost:8000/`.

### Test SSTI Vulnerability
Visit the application in your browser or through tools like `curl` or `Postman`, providing the `username` parameter in the query string. For example:

`http://localhost:8000/?username={{10 * 10}}`

Output:

```
Welcome 100!
```

Note: The default implementation is vulnerable to SSTI.

## Test Safe Implementation

The `safe.php` file has been safeguarded against this type of attack. To verify this, follow the steps below.

`http://localhost:8000/safe.php?username={{10 * 10}}`

Output:

```
Welcome {{10 * 10}}!
```

Visit the application again with different `username` parameters to observe the difference.

## Disclaimer

This application is intentionally vulnerable to demonstrate SSTI. Do not use it in a production environment. Always validate and sanitize user input.

## License

`PHPSSTI` is made with ♥  by [Wation](https://github.com/TheWation) and it's released under the `MIT` license.