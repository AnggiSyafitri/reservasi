<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps(['id', 'name', 'value' => '']) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps(['id', 'name', 'value' => '']); ?>
<?php foreach (array_filter((['id', 'name', 'value' => '']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<input
    type="hidden"
    name="<?php echo e($name); ?>"
    id="<?php echo e($id); ?>_input"
    value="<?php echo e($value); ?>"
/>

<trix-editor
    id="<?php echo e($id); ?>"
    input="<?php echo e($id); ?>_input"
    <?php echo e($attributes->merge(['class' => 'trix-content rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50'])); ?>

></trix-editor>
<?php /**PATH /home/sanettic/demo.sanetti.co.id/resources/views/components/trix-field.blade.php ENDPATH**/ ?>