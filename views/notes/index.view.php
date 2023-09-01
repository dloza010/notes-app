<?php require(__DIR__.'/../partials/head.php') ?>
<?php require(__DIR__.'/../partials/nav.php') ?>
<?php require(__DIR__.'/../partials/banner.php') ?>
	
	<main>
		<div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
			<!-- Your content -->
            <ul>
	            <?php foreach ($notes as $note) : ?>
                  <li>
                      <a href="/note?id=<?= $note['id'] ?>" class="text-blue-500 hover:underline">
						            <?= htmlspecialchars($note['body']) ?>
                      </a>
                  </li>
	            <?php endforeach; ?>
            </ul>
            
            
            
             <button class="mt-6 bg-blue-500 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">
                 <a href="/notes/create">
                     Create New Note
                 </a>
             </button>
            
			
		</div>
	</main>

<?php require(__DIR__.'/../partials/footer.php') ?>