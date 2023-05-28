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

    <!-- show error messages -->
    <?php if (!empty($_SESSION['err'])) : ?>
      <div class=" text-center py-4 lg:px-4">
        <div class="p-2  bg-rose-800  items-center text-indigo-100 leading-none lg:rounded-full flex lg:inline-flex" role="alert">
          <span class="flex rounded-full bg-rose-500  uppercase px-2 py-1 text-xs font-bold mr-3"><?= $_SESSION['title']; ?></span>
          <span class="font-semibold mr-2 text-left flex-auto"><?= $_SESSION['err']; ?></span>
        </div>
      </div>
    <?php endif; ?>

    <!-- show success messages -->
    <?php if (!empty($_SESSION['msg'])) : ?>
      <div class=" text-center py-4 lg:px-4">
        <div class="p-2  bg-teal-800  items-center text-indigo-100 leading-none lg:rounded-full flex lg:inline-flex" role="alert">
          <span class="flex rounded-full  bg-teal-500 uppercase px-2 py-1 text-xs font-bold mr-3"><?= $_SESSION['title']; ?></span>
          <span class="font-semibold mr-2 text-left flex-auto"><?= $_SESSION['msg']; ?></span>
        </div>
      </div>
    <?php endif; ?>

    <!-- empty session -->
    <?php
    if ($_SESSION['err'] === '') {
      unset($_SESSION['temp_order']);
    }

    $_SESSION['title'] = '';
    $_SESSION['msg'] = '';
    $_SESSION['err'] = '';
    ?>


    <?php include 'confirm-modal.php'; ?>