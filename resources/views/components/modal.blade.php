@props(['name', 'show' => false, 'maxWidth' => 'md'])

@php
    $maxWidth = [
        'sm' => 'sm:max-w-sm',
        'md' => 'sm:max-w-md',
        'lg' => 'sm:max-w-lg',
        'xl' => 'sm:max-w-xl',
        '2xl' => 'sm:max-w-2xl',
    ][$maxWidth];
@endphp

<div id="modal-{{ $name }}" class="fixed inset-0 z-50 overflow-y-auto px-4 py-6 sm:px-0"
    style="display: {{ $show ? 'block' : 'none' }}" role="dialog" aria-modal="true"
    aria-labelledby="modal-title-{{ $name }}">
    <!-- Backdrop -->
    <div class="fixed inset-0 transform transition-opacity duration-300 ease-in-out">
        <div class="absolute inset-0 bg-black/50 backdrop-blur-sm"></div>
    </div>

    <!-- Modal Content -->
    <div class="relative min-h-full flex items-center justify-center">
        <div class="relative w-full {{ $maxWidth }} bg-white rounded-lg shadow-lg transform transition-all duration-300 ease-in-out"
            @click.away="handleShow(false)">
            {{ $slot }}
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const modal = document.getElementById('modal-{{ $name }}');
        let focusables = [];
        let previouslyFocusedElement = null;

        function getFocusables() {
            const selector = [
                'a[href]',
                'button:not([disabled])',
                'input:not([disabled]):not([type="hidden"])',
                'select:not([disabled])',
                'textarea:not([disabled])',
                '[tabindex]:not([tabindex="-1"])',
                '[contenteditable]'
            ].join(',');

            return [...modal.querySelectorAll(selector)]
                .filter(el => !el.hasAttribute('disabled') && getComputedStyle(el).display !== 'none');
        }

        function handleShow(value) {
            if (value) {
                // Store the currently focused element
                previouslyFocusedElement = document.activeElement;

                // Show modal
                modal.style.display = 'block';
                document.body.classList.add('overflow-hidden');

                // Set focus on first focusable element
                @if ($attributes->has('focusable'))
                    setTimeout(() => {
                        focusables = getFocusables();
                        if (focusables.length) focusables[0].focus();
                    }, 50);
                @endif

                // Trigger open animation
                requestAnimationFrame(() => {
                    modal.querySelector('.bg-black\\/50').classList.add('opacity-100');
                    modal.querySelector('.relative.w-full').classList.add('translate-y-0',
                        'opacity-100');
                });
            } else {
                // Trigger close animation
                modal.querySelector('.bg-black\\/50').classList.remove('opacity-100');
                modal.querySelector('.relative.w-full').classList.remove('translate-y-0', 'opacity-100');

                // Hide modal after animation
                setTimeout(() => {
                    modal.style.display = 'none';
                    document.body.classList.remove('overflow-hidden');

                    // Restore focus to previous element
                    if (previouslyFocusedElement) {
                        previouslyFocusedElement.focus();
                    }
                }, 300);
            }
        }

        function handleTab(e) {
            e.preventDefault();
            focusables = getFocusables();
            const currentIndex = focusables.indexOf(document.activeElement);

            let nextIndex;
            if (e.shiftKey) {
                nextIndex = currentIndex > 0 ? currentIndex - 1 : focusables.length - 1;
            } else {
                nextIndex = currentIndex < focusables.length - 1 ? currentIndex + 1 : 0;
            }

            focusables[nextIndex]?.focus();
        }

        // Event Listeners
        window.addEventListener('open-modal', (event) => {
            if (event.detail === '{{ $name }}') {
                handleShow(true);
            }
        });

        window.addEventListener('close', () => handleShow(false));

        window.addEventListener('keydown', (e) => {
            if (modal.style.display === 'block') {
                if (e.key === 'Escape') {
                    handleShow(false);
                } else if (e.key === 'Tab') {
                    handleTab(e);
                }
            }
        });

        modal.querySelector('.fixed.inset-0.transform')?.addEventListener('click', () => handleShow(false));
    });
</script>
