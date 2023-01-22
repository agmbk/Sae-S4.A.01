import {Module} from '@nestjs/common';
import {TypeOrmModule} from "@nestjs/typeorm";
import {MatchModel} from "./models/match.model";
import {MatchService} from './match.service';
import {MatchController} from './match.controller';


@Module({
    imports: [TypeOrmModule.forFeature([MatchModel])],
    providers: [MatchService],
    controllers: [MatchController],
    exports: [MatchService]
})
export class MatchModule {

}
