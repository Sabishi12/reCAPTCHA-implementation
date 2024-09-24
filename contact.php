<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script type="text/javascript" src="js/sweetalert.min.js"></script>
    <title>Login</title>
</head>
<body  class="bg-gray-600 font-[sans-serif] bg-no-repeat bg-cover" style="background-image: url('img/BG5.JPEG');">
    

<nav class="bg-white border-gray-200 dark:bg-gray-900 ">
    <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl p-4">
        <a href="#" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="img/Logo.png" class="h-14"/>
        </a>
        <div class="flex items-center space-x-6 rtl:space-x-reverse">
            <a href="contact.php" class="text-xl  text-gray-500 dark:text-white hover:underline">Contact</a>
            <a href="Login.php" class="text-xl  text-gray-600 dark:text-white hover:underline">Login</a>
        </div>
    </div>
</nav>


<div>
      <div class=" flex flex-col items-center justify-center py-6">
        <div class="max-w-md w-full">
          <div class="p-8 rounded-2xl bg-white shadow bg-opacity-10">
            <h2 class="text-white text-center text-2xl font-bold">Contact</h2>
            <form class="mt-8 space-y-4" method="post">
              <div>
                <label class="text-white text-sm mb-2 block">User name</label>
                <div class="relative flex items-center">
                  <input name="username" type="text" required class="bg-transparent w-full text-white text-mg border-2 border-gray-300 px-4 py-3 rounded-md outline-blue-1000" placeholder="Enter user name" />
                </div>
              </div>

              <div>
                <label class="text-white text-sm mb-2 block">Message</label>
                <div class="relative flex items-center">
                  <textarea name="password" type="password" required class="bg-transparent w-full text-white text-mg border-2 border-gray-300 px-4 py-3 rounded-md outline-blue-1000" placeholder="Input message"></textarea>
                </div>
              </div>
              
              <div class="g-recaptcha" data-sitekey="6LdtTU0qAAAAAGgIqe3GbOdonrOqhBNOa-6Y-YQ2"></div>

              <div class="!mt-8">
                <button type="submit" id="open-modal" class="w-full py-3 px-4 text-mg tracking-wide rounded-lg text-white bg-blue-600 hover:bg-blue-700 focus:outline-none">
                 Send
                </button>
                
                <?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // reCAPTCHA verification
    $recaptcha_secret = "6LdtTU0qAAAAAJYSt3Y91Wl_DxmzGoVWMZM6K1mh";
    $recaptcha_response = $_POST['g-recaptcha-response'];

    $verify_response = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $recaptcha_secret . '&response=' . $recaptcha_response);
    $response_data = json_decode($verify_response);

    if ($response_data->success) {
        // reCAPTCHA validation successful
        // Process your form data here
?>
        

        <script>
          swal("Form submitted successfully!", {
                icon: "success",
                buttons: false,
              });
            
          </script>
<?php
    } else {
        // reCAPTCHA validation failed
        
?>

        <script>
          swal("reCAPTCHA verification failed. Please try again.", {
                icon: "error",
                buttons: false,
              });
          </script>
<?php
    }
} else {
    // If not a POST request, redirect to the form page

    exit();
}
?>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
</body>
</html>
