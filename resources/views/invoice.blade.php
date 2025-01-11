<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Invoice</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&display=swap"
      rel="stylesheet"
    />
    <link
      href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css"
      rel="stylesheet"
    />
    <style>
      body {
        font-family: "Nunito", sans-serif;
      }
    </style>
  </head>

  <body class="bg-white flex items-center justify-center min-h-screen">
    <div class="bg-white p-8 rounded-lg shadow-lg max-w-4xl w-full">
      <div class="flex justify-center items-center mb-8">
        <div class="flex items-center space-x-4">
          <div
            class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center text-white"
          >
            <i class="fas fa-check"></i>
          </div>
          <div
            class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center text-white"
          >
            <i class="fas fa-check"></i>
          </div>
          <div
            class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center text-white"
          >
            <i class="fas fa-check"></i>
          </div>
        </div>
      </div>

      <main class="flex flex-col items-center">
        <h2 class="text-2xl font-bold text-gray-800 mb-4">
          Yay! Payment Completed
        </h2>
        <img
          alt="Illustration of a completed payment with a check mark"
          class="mb-6"
          height="200"
          src="https://storage.googleapis.com/a1aa/image/pKDlaFGvXXqXHFMNOundKWeVGfy2g39QAMmJjRIKY2j249CUA.jpg"
          width="300"
        />
        <p class="text-center text-blue-600 mb-2">
          Please check your email &amp; phone Message.
          <br />
          We have sent all the Information
        </p>
        <a class="text-gray-400" href="{{ route('home') }}"> Go to Home </a>
      </main>
    </div>
  </body>
</html>
