<?php require base_path("views/partials/head.php"); ?>

<?php require base_path("views/partials/nav.php") ; ?>

<?php require base_path("views/partials/banner.php") ; ?>

  <main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
      
   <form method="POST" action="">
  <div class="space-y-12">
    <div class="border-b border-gray-900/10 pb-12">


        <div class="col-span-full">
          <label for="about" class="block text-sm/6 font-medium text-gray-900">Body</label>
          <div class="mt-2">
            <textarea 
            id="body" 
            name="body" 
            rows="3" 
            class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
            placeholder="Write your note here..."
           
            >
            <?= $_POST['body'] ?? '' ?>
          </textarea>

            <?= isset($errors['body']) ? '<p class="text-sm text-red-500 mt-1">' . $errors['body'] . '</p>' : '' ?>



          </div>
        </div>

     

    

    
  </div>

  <div class="mt-6 flex items-center justify-end gap-x-6">
    <button type="button" class="text-sm/6 font-semibold text-gray-900">Cancel</button>
    <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Create</button>
  </div>
</form>





    </div>
  </main>


<?php require base_path("views/partials/footer.php"); ?>