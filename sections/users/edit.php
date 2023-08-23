<?php 
include("../../db.php");

//Get the User's values
if(isset($_GET["txtID"])){
    $txtID = (isset($_GET["txtID"])) ? $_GET["txtID"] : "";

    $request = $connexion->prepare("SELECT * FROM `User` WHERE id = :id");
    $request->bindParam(":id", $txtID);
    $request->execute();
    $user = $request->fetch(PDO::FETCH_LAZY);
   
    $user_name = $user["user_name"];
    $email = $user["email"];
    $password = $user["password"];
}

//UPDATE the user
if ($_POST) {
    
    //Get the new values from the form
    $txtID = (isset($_GET["txtID"])) ? $_GET["txtID"] : "";
    $name_user = (isset($_POST["name"]) ? $_POST["name"] : "");
    $email = (isset($_POST["email"]) ? $_POST["email"] : "");
    $password = (isset($_POST["password"]) ? $_POST["password"] : "");

    $request = $connexion->prepare("UPDATE `User` SET 
        user_name =:user_name,
        email =:email,
        password = :password 
        WHERE id =:id"
    );

    //Give the new values
    $request->bindParam(":user_name",$name_user);
    $request->bindParam(":email",$email);
    $request->bindParam(":password",$password);
    $request->bindParam(":id",$txtID);
    $request->execute();

    header("Location;index.php");
}
?>

<?php include("../../templates/header.php") ?>

<section>
    <!-- component -->
    <!-- This is an example component -->
    <div class="max-w-2xl mx-auto bg-gray-100 rounded my-4 p-6">
        <h2 class="text-center p-4 text-indigo-900 uppercase font-bold mb-8">Edit user</h2>
        <form action="" method="post" enctype="multipart">
            <div class="grid gap-6 mb-6 lg:grid-cols-2">
                <div>
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Name</label>
                    <input type="text" id="name" value="<?php  echo $user_name; ?>" name="name" value= "<?php  echo $txtID ; //echo $user_name?>" class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-sky-50 dark:border-indigo-900 dark:placeholder-gray-400 dark:text-gray dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                </div>
                <div>
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Email</label>
                    <input type="email" id="email" name="email" value="<?php  echo $email; ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-sky-50 dark:border-indigo-900 dark:placeholder-gray-400 dark:text-gray dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="doe@mail.com" required>
                </div>
            </div>
            <div class="mb-6">
                <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Password</label>
                <input type="password" id="password" name="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-sky-50 dark:border-indigo-900  dark:placeholder-gray-400 dark:text-gray dark:focus:ring-blue-500 dark:focus:border-blue-500" value="<?php  echo $password; ?>" required>
            </div>

            <button type="submit" class="text-white bg-gradient-to-r from-violet-900 to-violet-700 rounded hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center  hover:bg-green-700 focus:ring-blue-800">Apply changes</button>

            <a href="index.php" class="text-white bg-gradient-to-r from-red-900 to-red-800 rounded hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center  hover:bg-blue-700 focus:ring-blue-800">Annulate</a>
        </form>


    </div>
</section>
<?php include("../../templates/footer.php") ?>