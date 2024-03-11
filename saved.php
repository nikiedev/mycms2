<div class="rating" data-rating="<?= $item->rating; ?>">
	<?php for ($i = 5; $i > 0; $i--): ?>
		<input type="radio" name="rating" id="r<?= $i; ?>" value="<?= $i; ?>" <?= $item->rating == $i ? ' checked' : '' ?>>
		<label for="r<?= $i; ?>" title="Оценка: <?= $i; ?>"></label>
	<?php endfor; ?>
</div>