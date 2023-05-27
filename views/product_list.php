<?php include 'header.php'; ?>

<div class="relative  ">

  <!-- Head Section -->
  <div class="flex items-center justify-between pb-4">

    <!-- Night Mode Toggle -->
    <button id="theme-toggle" type="button" class="text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-2.5">
      <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
        <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
      </svg>
      <svg id="theme-toggle-light-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
        <path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" fill-rule="evenodd" clip-rule="evenodd"></path>
      </svg>
    </button>

    <!-- Dropdown sort menu -->
    <div>
      <button id="dropdownRadioButton" data-dropdown-toggle="dropdownRadio" class="inline-flex items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-3 py-1.5 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700" type="button">
        <?= $_SESSION['sort_key'] ? $sort_keys[$_SESSION['sort_key']] : 'جدیدترین' ?>
        <svg class="w-3 h-3 ml-2" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
        </svg>
      </button>

      <div id="dropdownRadio" class="z-10 hidden w-48 bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600 text-right" data-popper-reference-hidden="" data-popper-escaped="" data-popper-placement="top" style="position: absolute; inset: auto auto 0px 0px; margin: 0px; transform: translate3d(522.5px, 3847.5px, 0px);">
        <ul class="p-3 space-y-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownRadioButton">

          <?php foreach ($sort_keys as $key => $val) : ?>
            <li>
              <div onclick="location.href='?sort_key=<?= $key ?>';" class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                <label for="<?= $key ?>" class="w-full ml-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300"><?= $val ?></label>
                <input type="radio" id="<?= $key ?>" value="<?= $key ?>" name="sort_key" <?= $_SESSION['sort_key'] == $key ? 'checked' : '' ?> class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
              </div>
            </li>
          <?php endforeach; ?>

        </ul>
      </div>
    </div>

  </div>

  <!-- Products list section -->
  <div class=" shadow-md dark:bg-gray-800 dark:text-white">
    <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
      <h2 class="sr-only">محصولات</h2>
      <div class="grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">

        <!-- Products -->
        <?php foreach ($products as $product) : ?>

          <form action="." method="post">
            <input type="hidden" name="sort_key" value="<?= $_SESSION['sort_key'] ?>">
            <input type="hidden" name="product_id" value="<?= $product['id'] ?>">


            <div class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
              <img class="p-8 rounded-t-lg " src="assets/img/<?= $product['id'] ?>.png" alt="product image" />
              <div class="px-5 pb-5">
                <a href="#">
                  <h5 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white"><?= $product['name'] ?></h5>
                </a>
                <div class="flex items-center mt-2.5 mb-5">
                  موجودی
                  <span class="bg-slate-100 text-slate-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-slate-200  dark:text-slate-800 ml-3"><?= $product['stock'] ?></span>
                </div>
                <div class="flex items-center justify-between">
                  <span class=" text-sm text-gray-900 dark:text-white">
                    <?php if ($product['discount']) : ?>
                      <p class="line-through text-rose-300"><?= number_format($product['price']) ?> تومان</p>
                      <p class=" text-cyan-500"><?= $product['discount'] ?> ٪ تخفیف</p>
                    <?php endif; ?>
                    <p class=" text-slate-900 dark:text-slate-300"><?= number_format($product['price'] * (1 - $product['discount'] / 100)) ?> تومان</p>
                  </span>

                  <?php include 'modal.php'; ?>

                  <!-- Modal toggle -->
                  <button data-modal-target="phone-number-modal-<?= $product['id'] ?>" data-modal-toggle="phone-number-modal-<?= $product['id'] ?>" class="text-slate-800 bg-slate-200 hover:bg-slate-300 focus:ring-4 focus:outline-none focus:ring-slate-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-slate-600 dark:hover:bg-slate-700 dark:ring-slate-800" type="button">
                    خرید
                  </button>

                </div>
              </div>
            </div>

          </form>

        <?php endforeach; ?>

      </div>
    </div>
  </div>

</div>

<?php include 'footer.php'; ?>