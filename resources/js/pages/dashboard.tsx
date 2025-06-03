import { PlaceholderPattern } from '@/components/ui/placeholder-pattern';
import AppLayout from '@/layouts/app-layout';
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/react';
import moment from 'moment';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: '/dashboard',
    },
];

interface Student {
    name: string;
    nis: string;
    gender_label: string;
    phone: string;
    address: string;
    email: string;
    photo: string;
    status_label: string;
}

type Internship = {
    teacher_id: number;
    industry_id: number;
    start: string;
    end: string;
    teacher?: {
        name: string;
        nip: string;
        phone: string;
    };
    industry?: {
        name: string;
    };
};

type Props = {
    student: Student | null;
    internship: Internship | null;
};

export default function Dashboard({ student, internship }: Props) {
    return (
        <AppLayout breadcrumbs={breadcrumbs}>
            <Head title="Dashboard" />

            <div className="p-6 bg-indigo-950 min-h-screen text-white space-y-6">
                {/* Flex container with gap */}
                <div className="flex flex-col md:flex-row gap-6">
                    {/* Kartu Informasi Siswa */}
                    <div className="w-full md:w-1/2">
                        {student ? (
                            <div className="rounded-xl overflow-hidden shadow-md bg-white text-black h-full">
                                <div className="bg-blue-500 text-white px-6 py-3 text-lg font-semibold">
                                    Informasi Siswa
                                </div>
                                <div className="flex flex-col md:flex-row items-center gap-6 px-6 py-6">
                                    <div className="w-32 h-32 rounded-full overflow-hidden bg-purple-100 flex items-center justify-center">
                                        {student.photo ? (
                                            <img
                                                src={`/storage/${student.photo}`}
                                                alt="Foto Siswa"
                                                className="object-cover w-full h-full"
                                            />
                                        ) : (
                                            <svg
                                                className="w-12 h-12 text-black"
                                                fill="currentColor"
                                                viewBox="0 0 24 24"
                                            >
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
                                            <p className="inline-block px-2 py-1 text-xs font-medium text-green-700 bg-green-100 rounded-full">
                                                ● {student.status_label}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        ) : (
                            <p className="text-red-500">Data siswa tidak ditemukan.</p>
                        )}
                    </div>

                    {/* Kartu Informasi PKL */}
                    <div className="w-full md:w-1/2">
                        {internship ? (
                            <div className="rounded-xl overflow-hidden shadow-md bg-white text-black h-full">
                                <div className="bg-violet-500 text-white px-6 py-3 text-lg font-semibold">
                                    Informasi PKL
                                </div>
                                <div className="px-6 py-4 text-sm space-y-2">
                                    <p><span className="text-gray-500">Industri:</span> {internship.industry?.name}</p>
                                    <p><span className="text-gray-500">Mulai:</span> {moment(internship.start).format('DD MMMM YYYY')}</p>
                                    <p><span className="text-gray-500">Selesai:</span> {moment(internship.end).format('DD MMMM YYYY')}</p>
                                    <p><span className="text-gray-500">Durasi:</span> {moment(internship.end).diff(moment(internship.start), 'days') + 1} hari</p>
                                </div>
                            </div>
                        ) : (
                            <p className="text-red-500">Data PKL tidak ditemukan.</p>
                        )}
                    </div>
                </div>

                {/* Kartu Informasi Pembimbing */}
                {internship?.teacher && (
                    <div className="w-full rounded-xl overflow-hidden shadow-md bg-white text-black">
                        <div className="bg-rose-500 text-white px-6 py-3 text-lg font-semibold">
                            Informasi Pembimbing
                        </div>
                        <div className="px-6 py-4 text-sm">
                            <table className="w-full table-auto">
                                <tbody>
                                    <tr>
                                        <td className="py-2 font-medium text-gray-600">Nama</td>
                                        <td className="py-2">{internship.teacher.name}</td>
                                    </tr>
                                    <tr className="border-t">
                                        <td className="py-2 font-medium text-gray-600">NIP</td>
                                        <td className="py-2">{internship.teacher.nip}</td>
                                    </tr>
                                    <tr className="border-t">
                                        <td className="py-2 font-medium text-gray-600">Kontak</td>
                                        <td className="py-2">{internship.teacher.phone}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                )}
            </div>

        </AppLayout>
    );
}




