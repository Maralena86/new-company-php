<!-- Connect with the database (with the file db.php)-->
<?php
include("../../db.php");

//Request to the Employer's table 
$request = $connexion->prepare("SELECT * from `Employer`");
//Request execution
$request->execute();
//Get the list of all employers
$list_employers = $request->fetchAll(PDO::FETCH_ASSOC);

?>

<?php include("../../templates/header.php") ?>
<!-- component -->
<section class="antialiased bg-gray-100 text-gray-600  px-4 pt-6">
    <div class="flex flex-col justify-center ">
        <!-- Table -->
        <div class="flex flex-shrink-0 items-center justify-center ">
            <img class="h-8 w-auto" src="https://clipground.com/images/logos-png-free-10.png" alt="Your Company">
        </div>
        <h2 class="text-center p-4 text-indigo-900 uppercase font-bold mb-8">Employer's list</h2>

        <div class=" bg-white shadow-lg rounded-sm border border-gray-200">
            <header class="px-5 py-4 border-b border-gray-100 text-center">

                <a href="create.php" class="bg-gradient-to-r from-indigo-900 to-sky-700 rounded text-white py-2 px-4">Create employer</a>
            </header>
            <div class="p-3">
                <div class="overflow-x-auto">
                    <table class="table-auto w-full">
                        <thead class="text-xs font-semibold uppercase text-gray-400 bg-gray-50">
                            <tr>
                                <th></th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-center">Name</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-center">CV</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-center">Position</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-center">Post's date</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-center">Action</div>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="text-sm divide-y divide-gray-100">
                            <?php foreach ($list_employers as $employer) { ?>
                                <tr>
                                    <td class="p-2 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="w-10 h-10 flex-shrink-0 mr-2 sm:mr-3"><img class="rounded-full" src=<?php echo $employer["img_photo"] ?> width="40" height="40" alt="Alex Shatov"></div>

                                        </div>
                                    </td>
                                    <td class="p-2 whitespace-nowrap">
                                        <div class="font-medium text-gray-800">
                                            <?php echo $employer["firstname"] . " " . $employer["lastname"] ?> 
                                        </div>
                                    </td>
                                    <td class="p-2 whitespace-nowrap">
                                        <div class="text-center font-medium text-gray-500">
                                            <?php echo $employer["cv"] ?> 
                                        </div>
                                    </td>
                                    <td class="p-2 whitespace-nowrap">
                                        <div class="text-lg text-center">
                                            <?php echo $employer["id_position"] ?> 
                                        </div></div>
                                    </td>
                                    <td class="p-2 whitespace-nowrap">
                                        <div class="text-lg text-center font-small text-gray-400">
                                            <?php echo $employer["poste_date"] ?> 
                                       </div>
                                    </td>
                                    <td class="p-2 whitespace-nowrap">
                                        <div class="text-lg text-center"><a href="create.php" class="bg-gradient-to-r from-sky-600 to-cyan-700 rounded text-white py-2 px-4">Card</a> | <a href="create.php" class="bg-gradient-to-r from-indigo-900 to-violet-700 rounded text-white py-2 px-4">Edit</a> | <a href="create.php" class="bg-gradient-to-r from-pink-900 to-pink-700 rounded text-white py-2 px-4">Delete</a></div>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include("../../templates/footer.php") ?>