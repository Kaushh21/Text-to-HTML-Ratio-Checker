document.addEventListener('DOMContentLoaded', function() {
    const checkButton = document.getElementById('check_ratio');
    const clearButton = document.getElementById('clear_result');
    const resultDiv = document.getElementById('result');
    const ratioOutput = document.getElementById('ratio_output');
    const textLengthOutput = document.getElementById('text_length_output');
    const htmlLengthOutput = document.getElementById('html_length_output');
    const textarea = document.getElementById('html_content');

    // Function to clean up extra spaces in the textarea
    const cleanTextarea = () => {
        // Replace multiple spaces and newlines with a single space, then trim
        textarea.value = textarea.value.replace(/\s+/g, ' ').trim();
    };

    // Add event listeners for input and paste
    textarea.addEventListener('input', cleanTextarea);
    textarea.addEventListener('paste', function() {
        setTimeout(cleanTextarea, 0); // Clean up after paste
    });

    checkButton.addEventListener('click', function() {
        const htmlContent = textarea.value;

        if (htmlContent.trim() === '') {
            alert('Please enter some HTML content.');
            return;
        }

        // Send AJAX request
        const xhr = new XMLHttpRequest();
        xhr.open('POST', window.location.href, true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

        xhr.onload = function() {
            if (xhr.status === 200) {
                const response = JSON.parse(xhr.responseText);
                ratioOutput.textContent = "The text-to-HTML ratio is: " + response.ratio + " (or " + response.percentage + "%)";
                textLengthOutput.textContent = "Total Text Length: " + response.textLength + " characters";
                htmlLengthOutput.textContent = "Total HTML Length: " + response.htmlLength + " characters";
                resultDiv.style.display = 'block'; // Show results
            }
        };

        xhr.send('html_content=' + encodeURIComponent(htmlContent));
    });

    clearButton.addEventListener('click', function() {
        textarea.value = ''; // Clear the textarea
        ratioOutput.textContent = '';
        textLengthOutput.textContent = '';
        htmlLengthOutput.textContent = '';
        resultDiv.style.display = 'none'; // Hide results
    });
});
