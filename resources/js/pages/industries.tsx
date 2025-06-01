import AppLayout from '@/layouts/app-layout';
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/react';
import { Mail, Phone, MapPin, User, Briefcase } from 'lucide-react';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Industries',
        href: '/industries',
    },
];

type Industry = {
    id: number;
    name: string;
    business_fields: string;
    address: string;
    phone: string;
    email: string;
    website: string;
    logo: string | null;
};

type Props = {
    industries: Industry[];
};

export default function Industries({ industries }: Props) {
    return (
        <AppLayout breadcrumbs={breadcrumbs}>
            <Head title="Industries" />
                <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                {industries.map((industry) => (
                    <div
                    key={industry.id}
                    className="bg-gradient-to-br from-cyan-600 to-blue-500 text-white rounded-xl shadow-md p-4 space-y-3 transform transition duration-300 hover:scale-105 hover:shadow-lg cursor-pointer"
                    >
                    <div className="flex items-center justify-between mb-2">
                        <h2 className="text-lg font-semibold">
                        CV. {industry.name}
                        </h2>
                        <div className="bg-white/20 p-2 rounded-full">
                        <Briefcase size={20} />
                        </div>
                    </div>

                    <div className="bg-white/10 rounded-lg p-4 space-y-2">
                        {/* <div className="flex items-center gap-2">
                        <User size={16} />
                        <span className="font-medium">
                            {industry.owner ?? 'N/A'}
                        </span>
                        </div> */}

                        <div className="flex items-center gap-2">
                        <Briefcase size={16} />
                        <span>{industry.business_fields}</span>
                        </div>

                        <div className="flex items-center gap-2">
                        <Mail size={16} />
                        <a
                            href={`mailto:${industry.email}`}
                            className="underline text-white hover:text-gray-200"
                        >
                            {industry.email}
                        </a>
                        </div>

                        <div className="flex items-center gap-2">
                        <Phone size={16} />
                        <span>{industry.phone}</span>
                        </div>

                        <div className="flex items-center gap-2">
                        <MapPin size={16} />
                        <span className="truncate">{industry.address}</span>
                        </div>

                        {industry.website && (
                        <div className="flex items-center gap-2">
                            <span>🌐</span>
                            <a
                            href={industry.website}
                            target="_blank"
                            rel="noopener noreferrer"
                            className="underline text-white hover:text-gray-200"
                            >
                            {industry.website}
                            </a>
                        </div>
                        )}
                    </div>
                    </div>
                ))}
                </div>

        </AppLayout>
    );
}
