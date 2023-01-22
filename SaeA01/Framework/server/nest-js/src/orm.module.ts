import {TypeOrmModule} from "@nestjs/typeorm";
import {ConfigModule, ConfigService} from "@nestjs/config";
import {join} from "path";

export default TypeOrmModule.forRootAsync({
    imports: [ConfigModule],
    inject: [ConfigService],
    useFactory: (configService: ConfigService) => ({
        type: "mysql",
        host: configService.get('DATABASE_HOST'),
        port: configService.get('DATABASE_PORT'),
        username: configService.get('DATABASE_USERNAME'),
        password: configService.get('DATABASE_PASSWORD'),
        database: configService.get('DATABASE_DB'),
        entities: [join(__dirname, '**', '*.models.{ts,js}')],
        autoLoadEntities: true,
        synchronize: true,
    }),
})