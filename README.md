# Text-to-HTML Ratio Checker

## Overview

The Text-to-HTML Ratio Checker is a web application that allows users to analyze the ratio of text to HTML code in their HTML content. This tool is useful for web developers and SEO specialists to ensure that their content is optimized for search engines by maintaining an appropriate balance between text and markup.

## Features

- **Calculate Text-to-HTML Ratio**: Automatically computes the ratio of text content to HTML code.
- **Display Results**: Shows the text-to-HTML ratio in both fractional and percentage formats.
- **Input HTML Content**: Users can paste their HTML code into a text area for analysis.
- **AJAX Integration**: Uses AJAX for seamless communication between the client and server without reloading the page.
- **Clear Results**: Easily reset the input and results.

## Technologies Used

- **PHP**: Server-side scripting language for processing requests and calculating ratios.
- **JavaScript**: Client-side scripting for handling user interactions and AJAX requests.
- **AJAX**: Asynchronous JavaScript and XML for sending requests to the server and updating results dynamically.
- **HTML/CSS**: Basic web technologies for structuring and styling the interface.

## Installation

1. **Clone the Repository**:
   ```bash
   git clone https://github.com/yourusername/ratio-checker.git
   cd ratio-checker

2. **Set Up Your Server**: Ensure you have a PHP server running (e.g., Apache, Nginx). Place the cloned repository in your server's root directory.

3. **Access the Application**: Open your web browser and navigate to http://localhost/ratio-checker/index.php.

## How to Use
- **Input HTML Content**: Paste your HTML code into the textarea provided on the webpage.
- **Check Ratio**: Click the "Check Ratio" button to calculate the text-to-HTML ratio.
- **View Results**: The results will be displayed below, showing the ratio, percentage, and lengths of text and HTML content.
- **Clear Results**: Use the "Clear Result" button to reset the input and output fields.

## Code Structure
- **index.php**: Main entry point of the application, handles form submission and displays results.
- **includes/RatioChecker.php**: Contains the RatioChecker class, which includes methods for calculating the ratio and extracting text from HTML.
- **js/script.js**: JavaScript file that handles user interactions and AJAX requests for processing input.

## Acknowledgements
- **OpenAI**: For providing the foundational tools and models that helped in developing this project.
- **Stack Overflow**: For the community support and solutions to various programming challenges encountered during development.
- **MDN Web Docs**: For comprehensive documentation on HTML, CSS, and JavaScript that guided implementation decisions.

  ![Screenshot (35)](https://github.com/user-attachments/assets/aa04e220-988b-43b6-a984-fb8c187ce05e)

  ![Screenshot (36)](https://github.com/user-attachments/assets/bbf8b162-1664-46b1-a7c0-27d0a2c1e3d0)

