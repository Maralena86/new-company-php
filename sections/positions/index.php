<?php
include("../../db.php");

//DELETE: Erase a position
if (isset($_GET["txtID"])) {
    $txtID = (isset($_GET["txtID"])) ? $_GET["txtID"] : "";
    $request = $connexion->prepare("DELETE FROM `Position` WHERE id = :id");
    $request->bindParam(":id", $txtID);
    $request->execute();
}

//READ: equest for the position's list
$request = $connexion->prepare("SELECT * from `Position`");
$request->execute();
$list_positions = $request->fetchAll(PDO::FETCH_ASSOC);

?>

<?php include("../../templates/header.php") ?>

<section class="antialiased bg-gray-100 text-gray-600  px-4 py-6">
    <div class="flex flex-col justify-center ">
        <!-- Table -->
        <div class="flex flex-shrink-0 items-center justify-center ">
            <img class="h-8 w-auto" src="https://clipground.com/images/logos-png-free-10.png" alt="Your Company">
        </div>
        <h2 class="text-center p-4 text-indigo-900 uppercase font-bold mb-8">Position's list</h2>
        <div class=" bg-white shadow-lg rounded-sm border border-gray-200">
            <header class="px-5 py-4 border-b border-gray-100 text-center">
                <a href="create.php" class="bg-gradient-to-r from-indigo-900 to-sky-700 rounded text-white py-2 px-4">Create position</a>
            </header>
            <div class="p-3">
                <div class="overflow-x-auto">
                    <table class="table-auto w-full">
                        <thead class="text-xs font-semibold uppercase text-gray-400 bg-gray-50">
                            <tr>
                                <th class="p-2 whitespace-nowrap ">
                                    <div class="font-semibold text-center">Id</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-center">Position</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-center">Action</div>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="text-sm divide-y divide-gray-100">
                            <?php foreach ($list_positions as $position) { ?>
                                <tr>
                                    <td class="p-2 whitespace-nowrap ">
                                        <div class="font-semibold text-center"><?php echo $position["id"] ?></div>
                                    </td>
                                    <td class="p-2 whitespace-nowrap">
                                        <div class="font-semibold text-center"><?php echo $position["position_name"] ?></div>
                                    </td>
                                    <td class="p-2 whitespace-nowrap">
                                        <div class="text-lg text-center">
                                            <a href="edit.php?txtID=<?php echo $position["id"]; ?>" class="bg-gradient-to-r from-indigo-900 to-violet-700 rounded text-white py-2 px-4">Edit</a>
                                            |
                                            <a href="index.php?txtID=<?php echo $position["id"]; ?>" class="bg-gradient-to-r from-pink-900 to-pink-700 rounded text-white py-2 px-4">Delete</a>
                                        </div>
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