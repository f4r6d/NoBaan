<!doctype html>
<html class="dark">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="assets/css/output.css" rel="stylesheet">
  <title><?= SITE_TITLE ?></title>

  <script>
    // On page load or when changing themes, best to add inline in `head` to avoid FOUC
    if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
      document.documentElement.classList.add('dark');
    } else {
      document.documentElement.classList.remove('dark')
    }
  </script>

</head>

<body class=" dark:bg-gray-800 dark:text-white">


  <div class="container mx-auto px-4" dir="rtl">
    <br>
    <h1 class="text-3xl font-bold  text-center">
      <a href=".">
        فروشگاه نوبان
      </a>
    </h1>
    <br>