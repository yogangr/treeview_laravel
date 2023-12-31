@extends('home')

@section('navbar')
    <h1 class="judul">{{ Str::upper($menu->title) }}</h1>
@endsection

@section('content')
    <link rel="stylesheet" href="/css/style.css">
    <div class="content-tree mt-5" id="content">
        <ul class="tree data">
            <li class="parent">
                @foreach ($items as $item)
                    <details id="parent">
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
                                <a href="" class="btn btn-primary info-btn" data-bs-toggle="modal"
                                    data-bs-target="#info-modal{{ $item->id }}"><i class="fa-solid fa-circle-info"
                                        style="color: #00b3ff;"></i></i></a>
                                @include('content.item.modal_description')
                            </div>
                        </summary>
                        @if (count($item->childs))
                            @include('content.item.child.manageChild', [
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
    </script> --}}

    {{-- <script>
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
            const childRemove = document.querySelectorAll("ul.tree > li > details > ul > li");

            childRemove.forEach((li) => {
                li.removeAttribute("style");
            });
        };

        mode2Button.addEventListener("click", () => {
            resetStylingMode1();
            // Enable mode2 and disable mode1
            mode1Button.style.display = "block";
            mode2Button.style.display = "none";

            function applyTreeStyles() {
                // Seleksi elemen-elemen yang membutuhkan gaya
                const tree = document.querySelector('.tree');
                const parentDetails = document.querySelectorAll('ul.tree > li.parent > details');
                const detailsOpen = document.querySelectorAll('details.open');
                const summary = document.querySelectorAll('ul.tree > li.parent > details > summary');
                const ulList = document.querySelectorAll('ul.tree > li.parent > details > ul');
                const liItems = document.querySelectorAll('ul.tree > li.parent > details > ul > li');

                // Gaya untuk .tree
                if (tree) {
                    tree.style.width = '100%';
                    tree.style.height = 'auto';
                    tree.style.textAlign = 'center';
                }

                if (detailsOpen) {
                    detailsOpen.forEach(detail => {
                        const afterElement = document.createElement('div');
                        afterElement.style.position = 'absolute';
                        afterElement.style.left = '500px';
                        afterElement.style.top = '87px';
                        afterElement.style.borderLeft = '2px solid';
                        afterElement.style.content = '';
                        afterElement.style.height = '25px';
                        detail.appendChild(afterElement);
                    });
                }

                if (liItems) {
                    liItems.forEach(li => {
                        li.style.display = 'inline-block';
                        li.style.padding = '10px';
                        li.style.marginRight = '200px';
                        li.style.position = 'relative';
                        li.style.left = '-200px';
                        li.style.justifyContent = 'space-between';
                        li.style.borderCollapse = 'collapse';
                    });

                    liItems.forEach(li => {
                        const beforeElement = document.createElement('div');
                        beforeElement.style.position = 'absolute';
                        beforeElement.style.left = '130px';
                        beforeElement.style.top = '5px';
                        beforeElement.style.borderLeft = '2px solid';
                        beforeElement.style.borderTop = '2px solid';
                        beforeElement.style.content = '';
                        beforeElement.style.width = '3em';
                        beforeElement.style.height = '30px';
                        li.appendChild(beforeElement);

                        const afterElement = document.createElement('div');
                        afterElement.style.position = 'absolute';
                        afterElement.style.top = '5px';
                        afterElement.style.borderTop = '2px solid';
                        afterElement.style.content = '';
                        afterElement.style.width = '590px';
                        afterElement.style.height = '1em';
                        li.appendChild(afterElement);
                    });

                    // nestedUlTreeLis.remove();
                }


                // Gaya untuk summary
                if (summary) {
                    summary.forEach(s => {
                        s.style.position = 'relative';
                        s.style.left = '25vw';
                    });
                }

                // Gaya untuk ul
                if (ulList) {
                    ulList.forEach(ul => {
                        ul.style.display = 'flex';
                        ul.style.position = 'relative';
                        ul.style.left = '0';
                    });
                }

                const nestedUlTreeLis = document.querySelectorAll("ul.tree > li");

                for (const li of nestedUlTreeLis) {
                    const lastChildLi = li.querySelector("ul > li:last-child");

                    if (lastChildLi) {
                        lastChildLi.querySelector(":before").style.width = "0";
                        lastChildLi.querySelector(":after").style.display = "none";
                    }

                    const firstChildLi = li.querySelector("ul > li:first-child");

                    if (firstChildLi) {
                        firstChildLi.querySelector(":after").style.left = "130px";
                    }
                }
            }

            // Panggil fungsi untuk menerapkan gaya
            applyTreeStyles();

        });


        mode1Button.addEventListener("click", () => {
            resetStylingMode2();
            // Enable mode1 and disable mode2
            mode1Button.style.display = "none";
            mode2Button.style.display = "block";
            return defaultMode();
        });
    </script> --}}

    {{-- <script>
        const allDetails = document.querySelectorAll('details>ul.child>li:not(:first-child) details');
        const summaryParent = document.querySelectorAll('summary.card-parent');

        // Membuat objek untuk menyimpan nilai transformasi pada setiap elemen details
        const transformValues = {};

        // Inisialisasi nilai transformasi
        allDetails.forEach((details, index) => {
            transformValues[index] = 0;
        });

        // Fungsi untuk menangani perubahan status open pada details
        function handleDetailsOpen(event) {
            const details = event.target;
            const isOpen = details.open;

            const index = Array.from(allDetails).indexOf(details);

            summaryParent.forEach(function(summary, i) {
                // Tambahkan gaya atau logika lain di sini
                if (i === index) {
                    transformValues[index] = isOpen ? transformValues[index] - 50 : transformValues[index] + 50;
                }

                summary.style.transform = `translateX(${transformValues[i]}%)`;
            });
        }

        // Fungsi untuk menangani penutupan details di atasnya
        function handleDetailsClose(event) {
            const closedDetails = event.target;
            const closedIndex = Array.from(allDetails).indexOf(closedDetails);

            // Reset nilai transformasi untuk elemen di bawah details yang ditutup
            allDetails.forEach(function(details, index) {
                if (index > closedIndex) {
                    transformValues[index] = 0; // Reset nilai transformasi
                    summaryParent[index].style.transform = `translateX(${transformValues[index]}%)`;
                }
            });
        }

        // Menambahkan event listener untuk setiap elemen details
        allDetails.forEach(function(details) {
            details.addEventListener('toggle', handleDetailsOpen);
        });

        // Menambahkan event listener untuk mendeteksi penutupan details di atasnya
        allDetails.forEach(function(details) {
            details.addEventListener('toggle', handleDetailsClose);
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
