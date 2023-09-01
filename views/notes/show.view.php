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
            <form method="POST" class="mt-6">
<!--                here we are suggesting to our backend that we want a delete method-->
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="id" value="<?= $note['id'] ?>">
                <button class="text-sm text-red-500">Delete</button>
            </form>
		</div>
	</main>

<?php require(__DIR__.'/../partials/footer.php') ?>