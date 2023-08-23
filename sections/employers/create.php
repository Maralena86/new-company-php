<?php
include("../../db.php");

if ($_POST) {
    print_r($_POST);
    print_r($_FILES);

    $new_employer =(isset($_POST["first_name"]) ? $_POST["first_name"] : "");
    $new_employer =(isset($_POST["last_name"]) ? $_POST["last_name"] : "");
    $new_employer =(isset($_POST["position_date"]) ? $_POST["position_date"] : "");
    $new_employer =(isset($_FILES["cv"]) ? $_FILES["cv"] : "");
    $new_employer =(isset($_POST["photo"]) ? $_POST["photo"] : "");
    $new_employer =(isset($_POST["id_position"]) ? $_POST["id_position"] : "");

    $request = $connexion->prepare("INSERT INTO `Position`(id, firstname, lastname, )");
}

//Get all the positions
$request = $connexion->prepare("SELECT * FROM `Position`");
$request->execute();
$position_list = $request->fetchAll(PDO::FETCH_ASSOC);

header("Location;index.php");

?>
<?php include("../../templates/header.php") ?>

<section>
    <!-- component -->
    <!-- This is an example component -->
    <div class="max-w-2xl mx-auto bg-gray-100 rounded my-4 p-6">
        <h2 class="text-center p-4 text-indigo-900 uppercase font-bold mb-8">Create register</h2>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="grid gap-6 mb-6 lg:grid-cols-2">
                <div>
                    <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">First name</label>
                    <input type="text" id="first_name" name="first_name" class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-sky-50 dark:border-indigo-900 dark:placeholder-gray-400 dark:text-gray dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="John" required>
                </div>
                <div>
                    <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Last name</label>
                    <input type="text" id="last_name" name="last_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-sky-50 dark:border-indigo-900 dark:placeholder-gray-400 dark:text-gray dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Doe" required>
                </div>
            </div>
            <div class="mb-6">
                <label for="position_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Position's date</label>
                <input type="date" id="position_date" name="position_date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-sky-50 dark:border-indigo-900  dark:placeholder-gray-400 dark:text-gray dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="phot.jpg" required>
            </div>
            <div class="mb-6">
                <label for="cv" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">CV(PDF)</label>
                <input type="file" id="cv" name="cv" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-sky-50 dark:border-indigo-900  dark:placeholder-gray-400 dark:text-gray dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="phot.jpg" required>
            </div>
            <div class="mb-6">
                <label for="photo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Photo</label>
                <input type="file" id="photo" name="photo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-sky-50 dark:border-indigo-900  dark:placeholder-gray-400 dark:text-gray dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="phot.jpg" required>
            </div>
            <div class="mb-6">
                <label for="id_position" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Position</label>
                <select id="id_position" name="id_position" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-sky-50 dark:border-indigo-900  dark:placeholder-gray-400 dark:text-gray dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                    <?php foreach($position_list as $position){?>
                    <option value="<?php echo $position["id"]; ?>"><?php echo $position["position_name"]; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="flex items-start mb-6">
                <div class="flex items-center h-5">
                    <input id="remember" type="checkbox" value="" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800" required>
                </div>
                <label for="remember" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-400">I agree with the <a href="#" class="text-blue-600 hover:underline dark:text-blue-500">terms and conditions</a>.</label>
            </div>
            <button type="submit" class="text-white bg-gradient-to-r from-indigo-900 to-sky-700 rounded hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center  hover:bg-blue-700 focus:ring-blue-800">Add register</button>

            <a href="index.php" class="text-white bg-gradient-to-r from-red-900 to-red-800 rounded hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center  hover:bg-blue-700 focus:ring-blue-800">Annulate</a>
        </form>
    </div>
</section>
<?php include("../../templates/footer.php") ?>