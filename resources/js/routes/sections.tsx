import { lazy, Suspense } from 'react';
import { Outlet, Navigate, useRoutes } from 'react-router-dom';

import Box from '@mui/material/Box';
import LinearProgress, { linearProgressClasses } from '@mui/material/LinearProgress';

import { varAlpha } from '../theme/styles';
import { AuthLayout } from '../layouts/auth';
import { DashboardLayout } from '../layouts/dashboard';

// ----------------------------------------------------------------------

export const HomePage = lazy(() => import('../pages/home'));
export const SignInPage = lazy(() => import('../pages/sign-in'));


// ----------------------------------------------------------------------

const renderFallback = (
  <Box display="flex" alignItems="center" justifyContent="center" flex="1 1 auto">
    <LinearProgress
      sx={{
        width: 1,
        maxWidth: 320,
        bgcolor: (theme) => varAlpha(theme.vars.palette.text.primaryChannel, 0.16),
        [`& .${linearProgressClasses.bar}`]: { bgcolor: 'text.primary' },
      }}
    />
  </Box>
);

export function Router() {
  return useRoutes([
    {
      element: (
        <DashboardLayout>
          <Suspense fallback={renderFallback}>
            <Outlet />
          </Suspense>
        </DashboardLayout>
      ),
      path: '/dashboard',
      children: [
        { element: <HomePage />, index: true },
      ],
    },
    {
      path: '/',
      element: (
        <AuthLayout>
          <SignInPage />
        </AuthLayout>
      ),
    },
  ]);
}
