<footer id="footer">
    <div
        class="site-footer px-6 bg-white dark:bg-slate-800 text-slate-500 dark:text-slate-300 py-4 ltr:ml-[248px] rtl:mr-[248px]">
        <div class="grid md:grid-cols-2 grid-cols-1 md:gap-5">
            <div class="text-center ltr:md:text-start rtl:md:text-right text-sm">
                {{ __('COPYRIGHT') }} ©
                <script>
                    document.write(new Date().getFullYear())
                </script> {{ __('All rights Reserved') }}
            </div>
            <div class="lg:text-right lg:justify-end-right text-center text-sm flex justify-center items-center">
                {{ __('Design & Develop by') }}
                <a href="https://ngkmhtr.dev" target="_blank" class="text-primary-500 font-semibold ml-2">
                    <img src={{ asset('images/logo/am.svg') }} alt="angkomuhtar" class="h-4">
                </a>
            </div>
        </div>
    </div>
</footer>
