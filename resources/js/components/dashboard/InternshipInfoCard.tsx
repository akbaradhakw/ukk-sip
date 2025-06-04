import React from 'react';
import moment from 'moment';

type Props = {
    internship: {
        industry?: { name: string };
        start: string;
        end: string;
    } | null;
};

export default function InternshipInfoCard({ internship }: Props) {
    if (!internship) {
        return         <div className="rounded-xl overflow-hidden shadow-md bg-white text-black h-full">
            <div className="bg-violet-500 text-white px-6 py-3 text-lg font-semibold">Informasi PKL</div>
            <div className="px-6 py-4 text-sm space-y-2">
                    <button
                        className="bg-blue-600 px-4 py-2 rounded hover:bg-blue-700"
                        onClick={()=>window.location.href = '/internship'}
                    >
                        Tambah Data Industri
                    </button>
            </div>
        </div>;
    }

    return (
        <div className="rounded-xl overflow-hidden shadow-md bg-white text-black h-full">
            <div className="bg-violet-500 text-white px-6 py-3 text-lg font-semibold">Informasi PKL</div>
            <div className="px-6 py-4 text-sm space-y-2">
                <p><span className="text-gray-500">Industri:</span> {internship.industry?.name}</p>
                <p><span className="text-gray-500">Mulai:</span> {moment(internship.start).format('DD MMMM YYYY')}</p>
                <p><span className="text-gray-500">Selesai:</span> {moment(internship.end).format('DD MMMM YYYY')}</p>
                <p><span className="text-gray-500">Durasi:</span> {moment(internship.end).diff(moment(internship.start), 'days') + 1} hari</p>
            </div>
        </div>
    );
}
