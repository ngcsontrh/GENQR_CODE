<x-user-layout>
    <x-slot name="title">
        Đọc mã QR
    </x-slot>

    <ol class="flex items-center whitespace-nowrap lg:px-12 mx-4 mt-10 text-md">
        <li class="inline-flex items-center">
            <a href="{{ route('home') }}"
               class="flex items-center text-gray-500 hover:text-blue-600 focus:outline-none focus:text-blue-600 dark:text-neutral-500 dark:hover:text-blue-500 dark:focus:text-blue-500">
                <svg class="shrink-0 me-3 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                     viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                     stroke-linecap="round" stroke-linejoin="round">
                    <path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                    <polyline points="9 22 9 12 15 12 15 22"></polyline>
                </svg>
                Trang chủ
            </a>
            <svg class="shrink-0 mx-2 size-4 text-gray-400 dark:text-neutral-600" xmlns="http://www.w3.org/2000/svg"
                 width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                 stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="m9 18 6-6-6-6"></path>
            </svg>
        </li>
        <li class="inline-flex items-center text-amber-700 truncate dark:text-neutral-200" aria-current="page">
            Đọc mã QR
        </li>
    </ol>

    <!-- Tiêu đề -->
    <h2 class="mx-auto text-center font-bold text-3xl text-green-600 mt-6 lg:mt-8 uppercase">
        Đọc mã QR
    </h2>

    <div class="flex flex-col lg:flex-row justify-between items-start lg:space-x-4 p-6 xl:mx-40">
        <div class="w-full xl:w-3/5 p-6 bg-white border rounded-xl shadow-xl flex flex-col items-center">
            <div id="qrResultContainer" class="w-full p-6 bg-white border rounded-xl shadow-xl mt-4 h-96 relative">
                <div id="qrResult">
                    <p class="text-center text-gray-700">
                        Chưa quét mã QR. Vui lòng tải lên một mã QR.
                    </p>
                </div>
                <button id="copyButton"
                        class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md m-6 absolute bottom-0 left-0 hidden"
                        onclick="copyDecodedText()">
                    Sao chép
                </button>
                <div class="flex justify-center mt-4">
                </div>
            </div>
        </div>

        <div class="w-full xl:w-2/5 p-6 bg-white border rounded-xl shadow-xl flex flex-col items-center">
            <div id="qrCodeContainer" class="w-auto bg-gray-200 mb-4 flex rounded-3xl justify-center items-center relative h-80">
                <!-- Preview image placeholder -->
                <img id="qrImage"
                     src="https://qrcode-gen.com/images/qrcode-default.png"
                     alt="QR Code"
                     class="w-full h-full opacity-50">
                <img id="logoOverlay"
                     src=""
                     alt="Logo"
                     class="absolute w-14 h-14 rounded-full hidden">
            </div>
            <div class="mt-4 w-full">
                <form class="flex justify-center" id="qrForm" enctype="multipart/form-data">
                    <meta name="csrf-token" content="{{ csrf_token() }}">
                    <button type="button"
                            class="bg-gray-400 text-white px-6 py-3 rounded-lg shadow w-32 items-center flex gap-1"
                            onclick="document.getElementById('qrcode').click();">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" width="24" height="24" fill="white">
                            <path d="M144 480C64.5 480 0 415.5 0 336c0-62.8 40.2-116.2 96.2-135.9c-.1-2.7-.2-5.4-.2-8.1c0-88.4 71.6-160 160-160c59.3 0 111 32.2 138.7 80.2C409.9 102 428.3 96 448 96c53 0 96 43 96 96c0 12.2-2.3 23.8-6.4 34.6C596 238.4 640 290.1 640 352c0 70.7-57.3 128-128 128l-368 0zm79-217c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l39-39L296 392c0 13.3 10.7 24 24 24s24-10.7 24-24l0-134.1 39 39c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-80-80c-9.4-9.4-24.6-9.4-33.9 0l-80 80z"/>
                        </svg>
                        Tải lên
                    </button>
                    <input type="file"
                           id="qrcode"
                           name="qr_code"
                           accept="image/*"
                           class="hidden"
                           onchange="handleQRUpload()">
                </form>
            </div>
        </div>
    </div>

    <script>

        function copyDecodedText() {
            const textToCopy = document.getElementById('qrResult').innerText;
            navigator.clipboard.writeText(textToCopy)
                .then(() => {
                    alert('Nội dung đã được sao chép!');
                })
                .catch((error) => {
                    alert('Không thể sao chép nội dung: ' + error);
                });
        }

        function parseDecodedText(decodedText) {
            if (decodedText.startsWith('WIFI:')) {
                const wifiInfo = parseWiFi(decodedText);
                return `
                <p class="text-xl"><strong>Wi-Fi Network:</strong></p>
                <p><strong>SSID:</strong> ${wifiInfo.ssid}</p>
                <p><strong>Encryption:</strong> ${wifiInfo.encryption}</p>
                <p><strong>Password:</strong> ${wifiInfo.password}</p>
            `;
            }

            if (decodedText.startsWith('SMSTO:')) {
                const smsInfo = parseSMS(decodedText);
                return `
                <p class="text-xl"><strong>SMS:</strong></p>
                <p><strong>Phone:</strong> ${smsInfo.phone}</p>
                <p><strong>Message:</strong> ${smsInfo.message}</p>
            `;
            }

            if (decodedText.startsWith('TEL:') || decodedText.startsWith('tel:')) {
                const phone = decodedText.slice(decodedText.indexOf(':') + 1);
                return `<p class="text-xl"><strong>Telephone:</strong> ${phone}</p>`;
            }

            if (decodedText.startsWith('mailto:')) {
                const emailInfo = parseEmail(decodedText);
                return `
                <p class="text-xl"><strong>Email:</strong></p>
                <p><strong>To:</strong> ${emailInfo.to}</p>
                <p><strong>Subject:</strong> ${emailInfo.subject}</p>
                <p><strong>Body:</strong> ${emailInfo.body}</p>
            `;
            }

            if (decodedText.startsWith('BEGIN:VCARD')) {
                const vCardInfo = parseVCard(decodedText);
                return `
                <p class="text-xl"><strong>vCard Information:</strong></p>
                <p><strong>Full Name:</strong> ${vCardInfo.fullName}</p>
                <p><strong>Email:</strong> ${vCardInfo.email}</p>
            `;
            }

            if (decodedText.startsWith('File type:')) {
                const fileInfo = parseFile(decodedText);
                return `
                <p class="text-xl"><strong>File Information:</strong></p>
                <p><strong>Type:</strong> ${fileInfo.type}</p>
                <p><strong>Category:</strong> ${fileInfo.category}</p>
                <p><strong>URL:</strong> <a href="${fileInfo.url}" class="text-blue-600" target="_blank">${fileInfo.url}</a></p>`
            }

            if (decodedText.startsWith('http://') || decodedText.startsWith('https://')) {
                return `<p><strong class="text-xl">Website:</strong></p>
                        <p><strong>URL</strong> <a href="${decodedText}" target="_blank" class="text-blue-600">${decodedText}</a></p>`;
            }

            return `<p class="text-xl"><strong>Plain Text:</strong></p>
                    <p>${decodedText}</p>`;
        }

        function parseWiFi(text) {
            const wifiData = text.slice(5, -2);
            const segments = wifiData.split(';');
            const wifiInfo = {};

            segments.forEach(segment => {
                const [key, value] = segment.split(':');
                if (key && value) {
                    wifiInfo[key.toUpperCase()] = value;
                }
            });

            return {
                ssid: wifiInfo['S'] || 'N/A',
                encryption: wifiInfo['T'] || 'N/A',
                password: wifiInfo['P'] || 'N/A'
            };
        }

        function parseSMS(text) {
            const parts = text.split(':');
            const phone = parts[1] || 'N/A';
            const message = parts.slice(2).join(':') || 'N/A';
            return { phone, message };
        }

        function parseEmail(text) {
            const mailtoContent = text.slice(7);
            const [to, params] = mailtoContent.split('?');
            let subject = 'N/A';
            let body = 'N/A';

            if (params) {
                const paramPairs = params.split('&');
                paramPairs.forEach(pair => {
                    const [key, value] = pair.split('=');
                    if (key === 'subject') subject = decodeURIComponent(value);
                    if (key === 'body') body = decodeURIComponent(value);
                });
            }

            return { to, subject, body };
        }

        function parseVCard(text) {
            const lines = text.split(/\r?\n/);
            const vCardInfo = {};

            lines.forEach(line => {
                if (line.startsWith('FN:')) {
                    vCardInfo.fullName = line.slice(3).trim();
                } else if (line.startsWith('EMAIL:')) {
                    vCardInfo.email = line.slice(6).trim();
                }
            });

            return {
                fullName: vCardInfo.fullName || 'N/A',
                email: vCardInfo.email || 'N/A'
            };
        }

        function parseFile(text) {
            const lines = text.split(/\r?\n/);
            const fileInfo = {};

            lines.forEach(line => {
                if (line.startsWith('File type:')) {
                    fileInfo.type = line.slice(10).trim();
                }
                if (line.startsWith('Category:')) {
                    fileInfo.category = line.slice(9).trim();
                } else if (line.startsWith('URL:')) {
                    fileInfo.url = line.slice(4).trim();
                }
            });

            return {
                type: fileInfo.type,
                category: fileInfo.category || 'N/A',
                url: fileInfo.url
            };
        }

        function handleQRUpload() {
            const fileInput = document.getElementById('qrcode');
            const file = fileInput.files[0];
            const qrImage = document.getElementById('qrImage');
            const qrResult = document.getElementById('qrResult');
            const copyButton = document.getElementById('copyButton');

            if (!file) {
                return;
            }

            // Preview the QR image
            const reader = new FileReader();
            reader.onload = function(e) {
                qrImage.src = e.target.result;
                qrImage.classList.remove('opacity-50');
                qrResult.innerHTML = '<p class="text-center">Ảnh mã QR đã được tải lên, sẵn sàng để quét.</p>';
            };
            reader.readAsDataURL(file);

            // Send file to the server for decoding
            const formData = new FormData();
            formData.append('qr_file', file);

            const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            fetch('{{ route("decode.qr") }}', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': token
                },
                body: formData
            })
                .then(response => {
                    if (!response.ok) {
                        throw new Error(`Server error: ${response.status}`);
                    }
                    return response.json();
                })
                .then(data => {
                    const formattedResult = parseDecodedText(data.decoded);
                    qrResult.innerHTML = formattedResult;
                    copyButton.style.display = 'inline-block';
                })
                .catch(error => {
                    qrResult.innerHTML = `<p>Error decoding QR: ${error.message}</p>`;
                    copyButton.style.display = 'none';
                });
        }
    </script>
</x-user-layout>
