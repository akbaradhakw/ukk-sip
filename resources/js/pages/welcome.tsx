import { type SharedData } from '@/types';
import { Head, Link, usePage } from '@inertiajs/react';

export default function Welcome() {
    const { auth } = usePage<SharedData>().props;

    return (
        <div className="min-h-screen bg-gradient-to-b from-indigo-950 via-slate-900 text-white">
            {/* Navigation */}
            <nav className="relative z-10 flex items-center justify-between px-6 py-4 lg:px-12">
                <div className="flex items-center space-x-2">
                    <span className="text-xl font-semibold text-white">internship.</span>
                </div>
            

                <div className="flex items-center space-x-4">
                    {auth?.user ? (
                        <a href="/dashboard" className="inline-block rounded-sm border border-gray-300 px-5 py-1.5 text-sm text-white hover:border-gray-400 transition-colors">
                            Dashboard
                        </a>
                    ) : (
                        <>
                            <a href="/login" className="inline-block px-5 py-1.5 text-sm text-white hover:text-gray-700 transition-colors">
                                Log in
                            </a>
                            <a href="/register" className="inline-block rounded-sm border border-gray-300 px-5 py-1.5 text-sm text-white hover:border-gray-400 transition-colors">
                                Sign up
                            </a>
                        </>
                    )}
                </div>
            </nav>

            {/* Hero Section */}
            <div className="relative px-6 py-16 lg:px-12 lg:py-24 flex items-center justify-center min-h-[60vh]">
                <div className="max-w-7xl my-auto mx-auto w-full">
                    <div className="text-center mb-16 ">
                        <h1 className="text-5xl lg:text-7xl font-bold text-white mb-6 leading-tight">
                            Better Internship Management.
                        </h1>
                        <p className="text-lg lg:text-xl text-white max-w-2xl mx-auto leading-relaxed">
                            Your data is a profitable asset. With Earnwave you control what 
                            data to share anonymously and earn from it.
                        </p>
                    </div>

                    {/* Main Dashboard Preview */}


                {/* Background decorative elements */}
                <div className="absolute top-0 left-0 w-full h-full overflow-hidden pointer-events-none">
                    <div className="absolute top-20 left-10 w-32 h-32 bg-blue-200 rounded-full opacity-20 animate-pulse"></div>
                    <div className="absolute bottom-20 right-10 w-48 h-48 bg-purple-200 rounded-full opacity-20 animate-pulse"></div>
                    <div className="absolute top-1/2 left-1/4 w-24 h-24 bg-violet-200 rounded-full opacity-20 animate-pulse"></div>
                </div>
            </div>
            </div>
        </div>
    );
}
