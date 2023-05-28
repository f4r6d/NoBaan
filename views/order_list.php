<?php include 'header.php'; ?>

<br>
<h1 class=" font-medium text-center">لیست سفارش ها</h1>
<br>





<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    #
                </th>
                <th scope="col" class="px-6 py-3">
                    محصول
                </th>
                <th scope="col" class="px-6 py-3">
                    تلفن
                </th>
                <th scope="col" class="px-6 py-3">
                    قیمت
                </th>
                <th scope="col" class="px-6 py-3">
                    تخفیف
                </th>
            </tr>
        </thead>
        <tbody>

            <?php foreach ($orders as $order) : ?>

                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <?= $order['id'] ?>
                    </th>
                    <td class="px-6 py-4">
                        <?= $order['name'] ?>
                    </td>
                    <td class="px-6 py-4">
                        <?= $order['phone_number'] ?>
                    </td>
                    <td class="px-6 py-4">
                        <?= number_format($order['amount']) ?> تومان
                    </td>
                    <td class="px-6 py-4">
                        <?php if ($order['discounted']) : ?>
                            <svg fill="none" stroke="currentColor" stroke-width="1.5" color="green" class=" w-8" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        <?php else : ?>
                            <svg fill="none" stroke="currentColor" stroke-width="1.5"  color="red" class=" w-8" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        <?php endif; ?>
                    </td>
                </tr>

            <?php endforeach; ?>

        </tbody>
    </table>
</div>


<?php include 'footer.php'; ?>