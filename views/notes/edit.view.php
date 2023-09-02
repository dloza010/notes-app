<?php require(__DIR__.'/../partials/head.php') ?>
<?php require(__DIR__.'/../partials/nav.php') ?>
<?php require(__DIR__.'/../partials/banner.php') ?>
 
	<main>
		<div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
			<!-- Your content -->
            <form method="POST" action="/note">
                <input type="hidden" name="_method" value="PATCH">
                <input type="hidden" name="id" value="<?= $note['id'] ?>">
                <div class="space-y-12">
                    <div class="border-b border-gray-900/10 pb-12">
                        
                        <div class="col-span-full">
                            <label for="body" class="block text-sm font-medium leading-6 text-gray-900">Body</label>
                            <div class="mt-2">
                                <textarea
                                    id="body"
                                    name="body"
                                    rows="3"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                    placeholder="Heres is an idea for a note..."
                                ><?= $note['body'] ?> </textarea>
                                
                                <?php if (isset($errors['body'])) : ?>
                                    <p class="text-red-500 text-xs mt-2"><?= $errors['body'] ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                        
                    </div>

                <div class="mt-6 flex items-center justify-end gap-x-6">
                    <button type="button" class="rounded-md bg-gray-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-gray-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                        <a href="/notes">Cancel</a>
                    </button>
                    <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                        Update
                    </button>
<!--                    <form method="POST" class="inline justify-center margin-auto mt-6">-->
<!--                        <!--                here we are suggesting to our backend that we want a delete method-->-->
<!--                        <input type="hidden" name="_method" value="DELETE">-->
<!--                        <input type="hidden" name="id" value="--><?php //= $note['id'] ?><!--">-->
<!--                        <button class="rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">-->
<!--                            Delete-->
<!--                        </button>-->
<!--                    </form>-->
                </div>
            </form>

        </div>
	</main>

<?php require(__DIR__.'/../partials/footer.php') ?>