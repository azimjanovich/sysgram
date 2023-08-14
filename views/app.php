<?php
session_start();
if (isset($_SESSION['data'])) {
    $status = $_SESSION['data']['status'];
    $text = $_SESSION['data']['text'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SYSGRAM WEBHOOK</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="flex h-screen justify-center items-center bg-[url('https://top-fon.com/uploads/posts/2023-01/1674875469_top-fon-com-p-skachat-fon-gori-dlya-prezentatsii-92.png')] bg-cover bg-center bg-no-repeat	">
    <div class="w-full max-w-xs">
        <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" action="/set-webhook" method="post">
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="url">
                    URL
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="url" type="url" name="url" placeholder="put url path for webhook">
            </div>
            <div class="flex items-center justify-between">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                    Set webhook
                </button>
            </div>
        </form>
        <p class="text-center text-gray-500 text-xs">
            &copy; <?= date('Y') ?> SYSGRAM. All rights reserved.
        </p>
    </div>

    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        if (<?= isset($text) ?>) {
            Toast.fire({
                icon: 'warning',
                title: '<?= $text ?>'
            })
        }
    </script>
</body>

</html>
<?php
session_destroy();
?>