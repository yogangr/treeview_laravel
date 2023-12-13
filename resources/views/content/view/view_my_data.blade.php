@extends('home')

@section('navbar')
    <h1 class="judul">{{ Str::upper($menu->title) }}</h1>
    <button class="btn btn-primary ms-auto">
        <a href="{{ route('add-item', ['id' => $menu->id]) }}">+</a>
    </button>
@endsection

@section('content')
    <link rel="stylesheet" href="/css/style.css">
    <div class="content-tree" id="content">
        <ul class="tree data">
            <li class="parent">
                @foreach ($items as $item)
                    <details id="parent" class="mydata">
                        <summary class="card m-3 card-parent">
                            <div class="card-body">
                                <h5 class="card-title">{{ $item->title }}</h5>
                                @if ($item->content1 || $item->content2)
                                    <hr>
                                    <div class="row">
                                        <div class="col-6 card-content">{{ $item->content1 }}</div>
                                        <div class="col-6 card-content">{{ $item->content2 }}</div>
                                    </div>
                                @endif
                                <a href="#" class="btn btn-primary info-btn" data-bs-toggle="modal"
                                    data-bs-target="#info-modal{{ $item->id }}"><i class="fa-solid fa-circle-info"
                                        style="color: #00b3ff;"></i></i></a>
                                @include('content.item.modal_description')
                                <a href="#" class="btn btn-primary edit-btn" data-bs-toggle="modal"
                                    data-bs-target="#edit-item-modal{{ $item->id }}"><i class="fas fa-edit"></i></a>
                                @include('content.item.modal_edit_item')
                                <a href="#" class="btn btn-primary delete-btn" data-bs-toggle="modal"
                                    data-bs-target="#delete-item-modal{{ $item->id }}"><i class="fa-solid fa-trash"
                                        style="color: #ff0000;"></i></i></a>
                                @include('content.item.delete_item_modal')

                            </div>
                        </summary>
                        @if (count($item->childs))
                            @include('content.item.child.manageMyDataChild', [
                                'childs' => $item->childs,
                            ])
                        @endif
                    </details>
                @endforeach
            </li>
        </ul>
    </div>
    {{-- <script>
        function getRandomColor() {
            const letters = '0123456789ABCDEF';
            let color = '#';
            for (let i = 0; i < 6; i++) {
                color += letters[Math.floor(Math.random() * 16)];
            }
            return color;
        }

        const elements = document.querySelectorAll('.tree, .child');

        elements.forEach(function(element) {
            element.style.color = getRandomColor();
        });
    </script>

    <script>
        const nestedUlTreeLis = document.querySelectorAll("ul.tree li");
        const defaultMode = nestedUlTreeLis.forEach((li) => {
            // Create and style the before pseudo-element
            const beforeElement = document.createElement("div");
            beforeElement.style.position = "absolute";
            beforeElement.style.left = "-10px";
            beforeElement.style.top = "-24px";
            beforeElement.style.borderLeft = "2px solid";
            beforeElement.style.borderBottom = "2px solid";
            beforeElement.style.content = "";
            beforeElement.style.width = "3em";
            beforeElement.style.height = "3em";
            li.prepend(beforeElement);

            // Create and style the after pseudo-element
            const afterElement = document.createElement("div");
            afterElement.style.position = "absolute";
            afterElement.style.left = "-10px";
            afterElement.style.bottom = "-22px";
            afterElement.style.borderLeft = "2px solid";
            afterElement.style.content = "";
            afterElement.style.width = "3em";
            afterElement.style.height = "100%";
            li.appendChild(afterElement);

            // Hide the after pseudo-element for the last child
            if (li.parentElement && li.parentElement.lastElementChild === li) {
                afterElement.style.display = "none";
            }

            // Hide the pseudo-elements for direct children of ul.tree
            if (li.parentElement === document.querySelector("ul.tree")) {
                beforeElement.style.display = "none";
                afterElement.style.display = "none";
            }
        });
        const mode1Button = document.getElementById("mode1Button");
        const mode2Button = document.getElementById("mode2Button");

        mode1Button.style.display = "none";
        mode2Button.style.display = "block";

        const tree = document.querySelector("ul.tree");

        const nestedDetailsSummaries = tree.querySelectorAll("ul.tree > li.parent > details > ul > li > details > summary");

        const resetStylingMode2 = () => {
            // Reset mode2 styling
            nestedDetailsSummaries.forEach((summary) => {
                summary.style.cssText = "";
                // const beforeElement = li.querySelector("div.mode2");
                // if (beforeElement) {
                //     beforeElement.style.cssText = "";
                // }
            });
        };

        const resetStylingMode1 = () => {
            // Reset mode2 styling
            nestedUlTreeLis.forEach((li) => {
                li.style.cssText = "";
                // const beforeElement = li.querySelector("div.mode1");
                // if (beforeElement) {
                //     beforeElement.remove();
                // }
                // const afterElement = li.querySelector("div.mode1-after");
                // if (afterElement) {
                //     afterElement.style.cssText = "";
                // }
            });
        };

        mode2Button.addEventListener("click", () => {
            resetStylingMode1();
            // Enable mode2 and disable mode1
            mode1Button.style.display = "block";
            mode2Button.style.display = "none";
            const mode2 = nestedDetailsSummaries.forEach((summary) => {
                summary.style.backgroundColor = "#04364A";

            });
        });


        mode1Button.addEventListener("click", () => {
            resetStylingMode2();
            // Enable mode1 and disable mode2
            mode1Button.style.display = "none";
            mode2Button.style.display = "block";
            return defaultMode();
            // const mode1 = nestedUlTreeLis.forEach((li) => {
            //     // Create and style the before pseudo-element
            //     const beforeElement = document.createElement("div");
            //     beforeElement.classList.add("mode1");
            //     beforeElement.style.position = "absolute";
            //     beforeElement.style.left = "-10px";
            //     beforeElement.style.top = "-24px";
            //     beforeElement.style.borderLeft = "2px solid";
            //     beforeElement.style.borderBottom = "2px solid";
            //     beforeElement.style.content = "";
            //     beforeElement.style.width = "3em";
            //     beforeElement.style.height = "3em";
            //     li.prepend(beforeElement);

            //     // Create and style the after pseudo-element
            //     const afterElement = document.createElement("div");
            //     afterElement.classList.add("mode1-after");
            //     afterElement.style.position = "absolute";
            //     afterElement.style.left = "-10px";
            //     afterElement.style.bottom = "-22px";
            //     afterElement.style.borderLeft = "2px solid";
            //     afterElement.style.content = "";
            //     afterElement.style.width = "3em";
            //     afterElement.style.height = "100%";
            //     li.appendChild(afterElement);

            //     // Hide the after pseudo-element for the last child
            //     if (li.parentElement && li.parentElement.lastElementChild === li) {
            //         afterElement.style.display = "none";
            //     }

            //     // Hide the pseudo-elements for direct children of ul.tree
            //     if (li.parentElement === document.querySelector("ul.tree")) {
            //         beforeElement.style.display = "none";
            //         afterElement.style.display = "none";
            //     }
            // });
        });
    </script> --}}


    {{-- <script>
        const detailsOpen = document.querySelectorAll('details>ul.child>li:not(:first-child) details');
        const summaryParent = document.querySelectorAll('summary.card-parent');
        if (detailsOpen) {
            summaryParent.forEach(function(summary) {
                summary.style.transform = 'translateX(-50%)';
                summary.style.backgroundColor = 'blue';
            });
        }
    </script> --}}
    {{-- <script>
        const detailsElements = document.querySelectorAll('details');

        for (const detailsElement of detailsElements) {
            detailsElement.addEventListener('toggle', () => {
                if (detailsElement.open) {
                    const childList = detailsElement.querySelector('ul.child');
                    if (childList) {
                        const detailsOpen = childList.querySelectorAll('li:not(:first-child) details[open]');
                        if (detailsOpen.length > 0) {
                            const summaryParent = detailsElement.querySelector('summary.card-parent');
                            if (summaryParent) {
                                summaryParent.style.transform = 'translateX(-50%)';
                                summaryParent.style.backgroundColor = 'blue';
                            }
                        }
                    }
                }
            });
        }
    </script> --}}
    {{-- <script>
        const allDetails = document.querySelectorAll('details>ul.child>li:not(:first-child) details');
        const summaryParent = document.querySelectorAll('summary.card-parent');

        // Fungsi untuk menangani perubahan status open pada details
        function handleDetailsOpen(event) {
            const details = event.target;
            const isOpen = details.open;

            summaryParent.forEach(function(summary) {
                // Tambahkan gaya atau logika lain di sini
                if (isOpen) {
                    summary.style.transform = 'translateX(-50%)';
                } else {
                    summary.style.transform = ' ';
                }
            });
        }

        // Menambahkan event listener untuk setiap elemen details
        allDetails.forEach(function(details) {
            details.addEventListener('toggle', handleDetailsOpen);
        });
    </script> --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const myDetails = document.getElementById('parent');

            myDetails.addEventListener('toggle', function() {
                if (myDetails.open) {
                    myDetails.classList.add('open');
                } else {
                    myDetails.classList.remove('open');
                }
            });
        });
    </script>
@endsection
