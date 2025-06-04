import React from 'react';

type Props = {
    student: {
        name: string;
        nis: string;
        gender_label: string;
        phone: string;
        address: string;
        email: string;
        photo: string;
        status_label: string;
    } | null;
};

export default function StudentInfoCard({ student }: Props) {
    if (!student) {
        return <p className="text-red-500">Data siswa tidak ditemukan.</p>;
    }

    return (
        <div className="rounded-xl overflow-hidden shadow-md bg-white text-black h-full">
            <div className="bg-blue-500 text-white px-6 py-3 text-lg font-semibold">Informasi Siswa</div>
            <div className="flex flex-col md:flex-row items-center gap-6 px-6 py-6">
                <div className="w-32 h-32 rounded-full overflow-hidden bg-purple-100 flex items-center justify-center">
                    {student.photo ? (
                        <img src={`/storage/${student.photo}`} alt="Foto Siswa" className="object-cover w-full h-full" />
                    ) : (
                        <svg className="w-12 h-12 text-black" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 12c2.7 0 5-2.3 5-5s-2.3-5-5-5-5 2.3-5 5 2.3 5 5 5zm0 2c-3.3 0-10 1.7-10 5v3h20v-3c0-3.3-6.7-5-10-5z" />
                        </svg>
                    )}
                </div>
                <div className="grid grid-cols-1 sm:grid-cols-2 gap-4 w-full text-sm">
                    <div>
                        <p className="text-gray-500">Nama Lengkap</p>
                        <p className="font-semibold">{student.name}</p>
                    </div>
                    <div>
                        <p className="text-gray-500">NIS</p>
                        <p className="font-semibold">{student.nis}</p>
                    </div>
                    <div>
                        <p className="text-gray-500">Jenis Kelamin</p>
                        <p className="font-semibold">{student.gender_label}</p>
                    </div>
                    <div>
                        <p className="text-gray-500">Status PKL</p>
                        <p
                        className={`inline-block px-2 py-1 text-xs font-medium rounded-full ${
                            student.status_label === 'Sudah diterima PKL'
                            ? 'bg-green-100 text-green-700'
                            : 'bg-red-100 text-red-700'
                        }`}
                        >
                        ● {student.status_label}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    );
}
