<?php require(__DIR__.'/../partials/head.php') ?>
<?php require(__DIR__.'/../partials/nav.php') ?>
<?php require(__DIR__.'/../partials/banner.php') ?>
	
	<main>
		<div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
            <p class="mb-6">
                <a href="/notes" class="text-blue-500 hover:underline">
                    Back to Notes
                </a>
            </p>
            
            <p>
              <?= htmlspecialchars($note['body']) ?>
            </p>
            
            <footer class="mt-6">
                <a href="/note/edit?id=<?= $note['id'] ?>"
                class="inline mt-6 bg-blue-500 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">
                    Edit
                </a>
            </footer>
            
		</div>
	</main>

<?php require(__DIR__.'/../partials/footer.php') ?>