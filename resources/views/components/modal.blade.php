@props(['name', 'show' => false, 'maxWidth' => '2xl'])

@php
    $maxWidth = [
        'sm' => 'sm:max-w-sm',
        'md' => 'sm:max-w-md',
        'lg' => 'sm:max-w-lg',
        'xl' => 'sm:max-w-xl',
        '2xl' => 'sm:max-w-2xl',
    ][$maxWidth];
@endphp

<div id="modal-{{ $name }}" class="fixed inset-0 overflow-y-auto px-4 py-6 sm:px-0 z-50"
    style="display: {{ $show ? 'block' : 'none' }};">
    <div class="fixed inset-0 transform transition-all">
        <div class="absolute inset-0 bg-gray-500 dark:bg-gray-600 opacity-75"></div>
    </div>

    <div
        class="mb-6 bg-surface rounded-lg overflow-hidden shadow-xl transform transition-all sm:w-full {{ $maxWidth }} sm:mx-auto">
        {{ $slot }}
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const modal = document.getElementById('modal-{{ $name }}');
        let focusables = [];

        function getFocusables() {
            const selector =
                'a, button, input:not([type="hidden"]), textarea, select, details, [tabindex]:not([tabindex="-1"])';
            return [...modal.querySelectorAll(selector)].filter(el => !el.hasAttribute('disabled'));
        }

        function handleShow(value) {
            if (value) {
                modal.style.display = 'block';
                document.body.classList.add('overflow-y-hidden');
                @if ($attributes->has('focusable'))
                    setTimeout(() => {
                        focusables = getFocusables();
                        if (focusables.length) focusables[0].focus();
                    }, 100);
                @endif
            } else {
                modal.style.display = 'none';
                document.body.classList.remove('overflow-y-hidden');
            }
        }

        window.addEventListener('open-modal', (event) => {
            if (event.detail === '{{ $name }}') {
                handleShow(true);
            }
        });

        window.addEventListener('close', () => handleShow(false));
        window.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') handleShow(false);

            if (e.key === 'Tab') {
                e.preventDefault();
                focusables = getFocusables();
                const currentIndex = focusables.indexOf(document.activeElement);

                if (e.shiftKey) {
                    // Move backwards
                    const prevIndex = Math.max(0, currentIndex - 1);
                    focusables[prevIndex]?.focus();
                } else {
                    // Move forwards
                    const nextIndex = (currentIndex + 1) % focusables.length;
                    focusables[nextIndex]?.focus();
                }
            }
        });

        modal.querySelector('.fixed.inset-0.transform')?.addEventListener('click', () => handleShow(false));
    });
</script>
