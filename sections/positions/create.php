<?php include("../../db.php");

//CREATE a new Position

if ($_POST) {
    $new_position = (isset($_POST["position_name"]) ? $_POST["position_name"] : "");
    $request = $connexion->prepare("INSERT INTO `Position`(id, position_name) VALUES (null,:position_name) ");
    $request->bindParam("position_name", $new_position);
    $request->execute();
    print_r($_POST);
}
?>

<?php include("../../templates/header.php") ?>

<section>
    <!-- component -->
    <div class="max-w-2xl mx-auto bg-gray-100 rounded my-4 p-6">
        <h2 class="text-center p-4 text-indigo-900 uppercase font-bold mb-8">Create position</h2>
        <form action="" method="post" enctype="multipart">
            <div class="grid gap-6 mb-6 lg:grid-cols-2">
                <div>
                    <label for="position_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Position</label>
                    <input type="text" id="position_name" name="position_name" class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-sky-50 dark:border-indigo-900 dark:placeholder-gray-400 dark:text-gray dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Rainbow's sealer" required>
                </div>
            </div>
            <button type="submit" class="text-white bg-gradient-to-r from-violet-900 to-violet-700 rounded hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center  hover:bg-green-700 focus:ring-blue-800">Add register</button>
            <a href="index.php" class="text-white bg-gradient-to-r from-red-900 to-red-800 rounded hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center  hover:bg-blue-700 focus:ring-blue-800">Annulate</a>
        </form>
    </div>
</section>

<?php include("../../templates/footer.php") ?>