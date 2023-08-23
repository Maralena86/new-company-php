<?php include("../../db.php");

//Get position's values
if (isset($_GET["txtID"])) {
    $txtID = (isset($_GET["txtID"])) ? $_GET["txtID"] : "";
    $request = $connexion->prepare("SELECT * FROM `Position` WHERE id = :id");
    $request->bindParam(":id", $txtID);
    $request->execute();
    $postion = $request->fetch(PDO::FETCH_LAZY);
    $position_id = $postion["id"];
    $position_name = $postion["position_name"];
}

//UPDATE Position's value
if ($_POST) {
    $new_position = (isset($_POST["position_name"]) ? $_POST["position_name"] : "");
    $request = $connexion->prepare("UPDATE `Position` SET
    position_name = :position_name
    WHERE id = :id
    ");
    $request->bindParam(":position_name", $new_position);
    $request->bindParam(":id", $txtID);
    $request->execute();
    header("Location:index.php");
}
?>

<?php include("../../templates/header.php") ?>

<section>
    <!-- component -->
    <div class="max-w-2xl mx-auto bg-gray-100 rounded my-4 p-6">
        <h2 class="text-center p-4 text-indigo-900 uppercase font-bold mb-8">Edit position</h2>
        <form action="" method="post" enctype="multipart">
            <div class=" gap-6 mb-6 lg:grid-cols-2">
                <div>
                    <label for="txtID" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">ID</label>
                    <input type="text" id="txtID" readonly value="<?php echo $position_id; ?>" name="txtID" class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-sky-50 dark:border-indigo-900 dark:placeholder-gray-400 dark:text-gray dark:focus:ring-blue-500 dark:focus:border-blue-500 mb-5" required>
                </div>
                <div>
                    <label for="position_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Position</label>
                    <input type="text" id="position_name" value="<?php echo $position_name; ?>" name="position_name" class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-sky-50 dark:border-indigo-900 dark:placeholder-gray-400 dark:text-gray dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                </div>
            </div>
            <button type="submit" class="text-white bg-gradient-to-r from-violet-900 to-violet-700 rounded hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center  hover:bg-green-700 focus:ring-blue-800">Apply changes</button>
            <a href="index.php" class="text-white bg-gradient-to-r from-red-900 to-red-800 rounded hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center  hover:bg-blue-700 focus:ring-blue-800">Annulate</a>
        </form>
    </div>
</section>

<?php include("../../templates/footer.php") ?>