import React from 'react';

type Props = {
    teacher: {
        name: string;
        nip: string;
        phone: string;
    };
};

export default function TeacherInfoCard({ teacher }: Props) {
    return (
        <div className="w-full rounded-xl overflow-hidden shadow-md bg-white text-black">
            <div className="bg-rose-500 text-white px-6 py-3 text-lg font-semibold">Informasi Pembimbing</div>
            <div className="px-6 py-4 text-sm">
                <table className="w-full table-auto">
                    <tbody>
                        <tr>
                            <td className="py-2 font-medium text-gray-600">Nama</td>
                            <td className="py-2">{teacher.name}</td>
                        </tr>
                        <tr className="border-t">
                            <td className="py-2 font-medium text-gray-600">NIP</td>
                            <td className="py-2">{teacher.nip}</td>
                        </tr>
                        <tr className="border-t">
                            <td className="py-2 font-medium text-gray-600">Kontak</td>
                            <td className="py-2">{teacher.phone}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    );
}
